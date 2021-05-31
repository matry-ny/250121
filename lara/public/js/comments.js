/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**********************************!*\
  !*** ./resources/js/comments.js ***!
  \**********************************/
var commentForm = $('#add-comment-form');
commentForm.on('submit', function (e) {
  e.stopPropagation();
  e.preventDefault();
  $.ajax({
    type: 'post',
    url: '/api/comment',
    headers: {
      'Authorization': 'Bearer 123'
    },
    dataType: 'json',
    contentType: 'application/json',
    data: JSON.stringify({
      comment: commentForm.find('textarea[name="comment"]').val()
    }),
    success: function success(data) {
      $('#comments-list').find('tbody').append($('<tr/>').append($('<td/>').text(data.id)).append($('<td/>').text(data.author.name)).append($('<td/>').text(formatDate(data.created_at))).append($('<td/>').text(data.comment)));
    }
  });
});

function formatDate(dateStr) {
  var d = new Date(dateStr);
  return d.getFullYear() + '-' + (d.getMonth() + 1).toString().padStart(2, '0') + '-' + d.getDate().toString().padStart(2, '0') + ' ' + d.getHours() + ':' + d.getMinutes().toString().padStart(2, '0') + ':' + d.getSeconds().toString().padStart(2, '0');
}
/******/ })()
;