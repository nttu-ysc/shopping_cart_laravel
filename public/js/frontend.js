/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/*!**********************************!*\
  !*** ./resources/js/frontend.js ***!
  \**********************************/
eval("$.ajaxSetup({\n  headers: {\n    'X-CSRF-TOKEN': $('meta[name=\"csrf-token\"]').attr('content')\n  }\n});\n$('.cart-table').on('blur', '.cart-quantity', function (e) {\n  var id = $(e.currentTarget).closest('tr').data('id');\n  var quantity = $(e.currentTarget).val();\n  var action = '/carts/update/' + id;\n\n  if (quantity > 0) {\n    $.post(action, {\n      quantity: quantity\n    }).done(function (data) {\n      window.location.reload();\n    });\n  }\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvZnJvbnRlbmQuanM/ZmE1OCJdLCJuYW1lcyI6WyIkIiwiYWpheFNldHVwIiwiaGVhZGVycyIsImF0dHIiLCJvbiIsImUiLCJpZCIsImN1cnJlbnRUYXJnZXQiLCJjbG9zZXN0IiwiZGF0YSIsInF1YW50aXR5IiwidmFsIiwiYWN0aW9uIiwicG9zdCIsImRvbmUiLCJ3aW5kb3ciLCJsb2NhdGlvbiIsInJlbG9hZCJdLCJtYXBwaW5ncyI6IkFBQUFBLENBQUMsQ0FBQ0MsU0FBRixDQUFZO0FBQ1JDLEVBQUFBLE9BQU8sRUFBRTtBQUNMLG9CQUFnQkYsQ0FBQyxDQUFDLHlCQUFELENBQUQsQ0FBNkJHLElBQTdCLENBQWtDLFNBQWxDO0FBRFg7QUFERCxDQUFaO0FBTUFILENBQUMsQ0FBQyxhQUFELENBQUQsQ0FBaUJJLEVBQWpCLENBQW9CLE1BQXBCLEVBQTRCLGdCQUE1QixFQUE4QyxVQUFVQyxDQUFWLEVBQWE7QUFDdkQsTUFBSUMsRUFBRSxHQUFHTixDQUFDLENBQUNLLENBQUMsQ0FBQ0UsYUFBSCxDQUFELENBQW1CQyxPQUFuQixDQUEyQixJQUEzQixFQUFpQ0MsSUFBakMsQ0FBc0MsSUFBdEMsQ0FBVDtBQUNBLE1BQUlDLFFBQVEsR0FBR1YsQ0FBQyxDQUFDSyxDQUFDLENBQUNFLGFBQUgsQ0FBRCxDQUFtQkksR0FBbkIsRUFBZjtBQUNBLE1BQUlDLE1BQU0sR0FBRyxtQkFBbUJOLEVBQWhDOztBQUNBLE1BQUlJLFFBQVEsR0FBRyxDQUFmLEVBQWtCO0FBQ2RWLElBQUFBLENBQUMsQ0FBQ2EsSUFBRixDQUFPRCxNQUFQLEVBQWU7QUFBRUYsTUFBQUEsUUFBUSxFQUFFQTtBQUFaLEtBQWYsRUFDS0ksSUFETCxDQUNVLFVBQVVMLElBQVYsRUFBZ0I7QUFDbEJNLE1BQUFBLE1BQU0sQ0FBQ0MsUUFBUCxDQUFnQkMsTUFBaEI7QUFDSCxLQUhMO0FBSUg7QUFDSixDQVZEIiwic291cmNlc0NvbnRlbnQiOlsiJC5hamF4U2V0dXAoe1xyXG4gICAgaGVhZGVyczoge1xyXG4gICAgICAgICdYLUNTUkYtVE9LRU4nOiAkKCdtZXRhW25hbWU9XCJjc3JmLXRva2VuXCJdJykuYXR0cignY29udGVudCcpXHJcbiAgICB9XHJcbn0pO1xyXG5cclxuJCgnLmNhcnQtdGFibGUnKS5vbignYmx1cicsICcuY2FydC1xdWFudGl0eScsIGZ1bmN0aW9uIChlKSB7XHJcbiAgICB2YXIgaWQgPSAkKGUuY3VycmVudFRhcmdldCkuY2xvc2VzdCgndHInKS5kYXRhKCdpZCcpO1xyXG4gICAgdmFyIHF1YW50aXR5ID0gJChlLmN1cnJlbnRUYXJnZXQpLnZhbCgpO1xyXG4gICAgdmFyIGFjdGlvbiA9ICcvY2FydHMvdXBkYXRlLycgKyBpZDtcclxuICAgIGlmIChxdWFudGl0eSA+IDApIHtcclxuICAgICAgICAkLnBvc3QoYWN0aW9uLCB7IHF1YW50aXR5OiBxdWFudGl0eSwgfSlcclxuICAgICAgICAgICAgLmRvbmUoZnVuY3Rpb24gKGRhdGEpIHtcclxuICAgICAgICAgICAgICAgIHdpbmRvdy5sb2NhdGlvbi5yZWxvYWQoKTtcclxuICAgICAgICAgICAgfSk7XHJcbiAgICB9XHJcbn0pOyJdLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvZnJvbnRlbmQuanMuanMiLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/frontend.js\n");
/******/ })()
;