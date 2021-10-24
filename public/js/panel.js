/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/panel/custom_scripts.js":
/*!**********************************************!*\
  !*** ./resources/js/panel/custom_scripts.js ***!
  \**********************************************/
/***/ (() => {

$(document).ready(function () {
  // Loader
  setTimeout(function () {
    $(".overlay").css({
      display: "none"
    });
  }, 2000);
  setTimeout(function () {
    $(".overlay, body").addClass("loaded");
  }, 60000);
});

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!*******************************!*\
  !*** ./resources/js/panel.js ***!
  \*******************************/
// Custom JS
__webpack_require__(/*! ./panel/custom_scripts */ "./resources/js/panel/custom_scripts.js");
})();

/******/ })()
;