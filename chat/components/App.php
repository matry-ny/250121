<?php

namespace components;

use components\cli\CliDispatcher;
use components\web\Sessions;
use components\web\WebDispatcher;
use RuntimeException;

class App
{
    private const ROUTER = 'router';
    private const VIEW = 'view';
    private const DB = 'db';
    private const SESSION = 'session';

    private Storage $config;

    private Storage $components;

    private static ?App $app = null;

    public static function init(array $config): self
    {
        if (self::$app !== null) {
            throw new RuntimeException('Application is already initiated');
        }

        self::$app = new self($config);
        return self::$app;
    }

    public static function instance(): self
    {
        if (self::$app === null) {
            throw new RuntimeException('Application is not initiated yet');
        }

        return self::$app;
    }

    public function run(): mixed
    {
        $this->initDb();
        $this->initSessions();
        $this->initView();
        return $this->initRouter();
    }

    private function initRouter(): mixed
    {
        if (PHP_SAPI === 'cli') {
            $dispatcher = new CliDispatcher();
        } else {
            $dispatcher = new WebDispatcher();
        }

        $router = new Router($dispatcher);
        $this->components->set(self::ROUTER, $router);

        return $router->init();
    }

    private function initView(): void
    {
        $view = new View(
            $this->config->get('views.dir'),
            $this->config->get('views.ext'),
            $this->config->get('views.layouts.dir'),
            $this->config->get('views.layouts.default')
        );
        $this->components->set(self::VIEW, $view);
    }

    public function getView(): View
    {
        return $this->components->get(self::VIEW);
    }

    public function initDb(): void
    {
        $db = new DB(
            $this->config->get('db.host'),
            $this->config->get('db.user'),
            $this->config->get('db.password'),
            $this->config->get('db.name')
        );
        $this->components->set(self::DB, $db);
    }

    public function getDb(): DB
    {
        return $this->components->get(self::DB);
    }

    public function initSessions(): void
    {
        $this->components->set(self::SESSION, new Sessions());
    }

    public function getSession(): Sessions
    {
        return $this->components->get(self::SESSION);
    }

    public function config(): Storage
    {
        return $this->config;
    }

    private function __construct(array $config)
    {
        $this->config = new Storage($config);
        $this->components = new Storage();
    }

    private function __clone(): void
    {
    }
}
