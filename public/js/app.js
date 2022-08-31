/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports) {

throw new Error("Module build failed (from ./node_modules/babel-loader/lib/index.js):\nSyntaxError: C:\\Users\\silvi\\Documents\\BOOLEAN\\LARAVEL\\bool-bnb\\resources\\js\\app.js: Unexpected token, expected \",\" (116:0)\n\n\u001b[0m \u001b[90m 114 |\u001b[39m     \u001b[90m//va messo nell'html del form il codice per la verifica e-mail\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 115 |\u001b[39m\u001b[0m\n\u001b[0m\u001b[31m\u001b[1m>\u001b[22m\u001b[39m\u001b[90m 116 |\u001b[39m })\u001b[0m\n\u001b[0m \u001b[90m     |\u001b[39m \u001b[31m\u001b[1m^\u001b[22m\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 117 |\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 118 |\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 119 |\u001b[39m\u001b[0m\n    at instantiate (C:\\Users\\silvi\\Documents\\BOOLEAN\\LARAVEL\\bool-bnb\\node_modules\\@babel\\parser\\lib\\index.js:72:32)\n    at constructor (C:\\Users\\silvi\\Documents\\BOOLEAN\\LARAVEL\\bool-bnb\\node_modules\\@babel\\parser\\lib\\index.js:366:12)\n    at Parser.raise (C:\\Users\\silvi\\Documents\\BOOLEAN\\LARAVEL\\bool-bnb\\node_modules\\@babel\\parser\\lib\\index.js:3453:19)\n    at Parser.unexpected (C:\\Users\\silvi\\Documents\\BOOLEAN\\LARAVEL\\bool-bnb\\node_modules\\@babel\\parser\\lib\\index.js:3491:16)\n    at Parser.expect (C:\\Users\\silvi\\Documents\\BOOLEAN\\LARAVEL\\bool-bnb\\node_modules\\@babel\\parser\\lib\\index.js:4128:28)\n    at Parser.parseCallExpressionArguments (C:\\Users\\silvi\\Documents\\BOOLEAN\\LARAVEL\\bool-bnb\\node_modules\\@babel\\parser\\lib\\index.js:12993:14)\n    at Parser.parseCoverCallAndAsyncArrowHead (C:\\Users\\silvi\\Documents\\BOOLEAN\\LARAVEL\\bool-bnb\\node_modules\\@babel\\parser\\lib\\index.js:12908:29)\n    at Parser.parseSubscript (C:\\Users\\silvi\\Documents\\BOOLEAN\\LARAVEL\\bool-bnb\\node_modules\\@babel\\parser\\lib\\index.js:12833:19)\n    at Parser.parseSubscripts (C:\\Users\\silvi\\Documents\\BOOLEAN\\LARAVEL\\bool-bnb\\node_modules\\@babel\\parser\\lib\\index.js:12802:19)\n    at Parser.parseExprSubscripts (C:\\Users\\silvi\\Documents\\BOOLEAN\\LARAVEL\\bool-bnb\\node_modules\\@babel\\parser\\lib\\index.js:12791:17)\n    at Parser.parseUpdate (C:\\Users\\silvi\\Documents\\BOOLEAN\\LARAVEL\\bool-bnb\\node_modules\\@babel\\parser\\lib\\index.js:12764:21)\n    at Parser.parseMaybeUnary (C:\\Users\\silvi\\Documents\\BOOLEAN\\LARAVEL\\bool-bnb\\node_modules\\@babel\\parser\\lib\\index.js:12734:23)\n    at Parser.parseMaybeUnaryOrPrivate (C:\\Users\\silvi\\Documents\\BOOLEAN\\LARAVEL\\bool-bnb\\node_modules\\@babel\\parser\\lib\\index.js:12525:61)\n    at Parser.parseExprOps (C:\\Users\\silvi\\Documents\\BOOLEAN\\LARAVEL\\bool-bnb\\node_modules\\@babel\\parser\\lib\\index.js:12532:23)\n    at Parser.parseMaybeConditional (C:\\Users\\silvi\\Documents\\BOOLEAN\\LARAVEL\\bool-bnb\\node_modules\\@babel\\parser\\lib\\index.js:12502:23)\n    at Parser.parseMaybeAssign (C:\\Users\\silvi\\Documents\\BOOLEAN\\LARAVEL\\bool-bnb\\node_modules\\@babel\\parser\\lib\\index.js:12454:21)\n    at Parser.parseExpressionBase (C:\\Users\\silvi\\Documents\\BOOLEAN\\LARAVEL\\bool-bnb\\node_modules\\@babel\\parser\\lib\\index.js:12390:23)\n    at C:\\Users\\silvi\\Documents\\BOOLEAN\\LARAVEL\\bool-bnb\\node_modules\\@babel\\parser\\lib\\index.js:12384:39\n    at Parser.allowInAnd (C:\\Users\\silvi\\Documents\\BOOLEAN\\LARAVEL\\bool-bnb\\node_modules\\@babel\\parser\\lib\\index.js:14480:16)\n    at Parser.parseExpression (C:\\Users\\silvi\\Documents\\BOOLEAN\\LARAVEL\\bool-bnb\\node_modules\\@babel\\parser\\lib\\index.js:12384:17)\n    at Parser.parseStatementContent (C:\\Users\\silvi\\Documents\\BOOLEAN\\LARAVEL\\bool-bnb\\node_modules\\@babel\\parser\\lib\\index.js:14920:23)\n    at Parser.parseStatement (C:\\Users\\silvi\\Documents\\BOOLEAN\\LARAVEL\\bool-bnb\\node_modules\\@babel\\parser\\lib\\index.js:14777:17)\n    at Parser.parseBlockOrModuleBlockBody (C:\\Users\\silvi\\Documents\\BOOLEAN\\LARAVEL\\bool-bnb\\node_modules\\@babel\\parser\\lib\\index.js:15420:25)\n    at Parser.parseBlockBody (C:\\Users\\silvi\\Documents\\BOOLEAN\\LARAVEL\\bool-bnb\\node_modules\\@babel\\parser\\lib\\index.js:15411:10)\n    at Parser.parseProgram (C:\\Users\\silvi\\Documents\\BOOLEAN\\LARAVEL\\bool-bnb\\node_modules\\@babel\\parser\\lib\\index.js:14695:10)\n    at Parser.parseTopLevel (C:\\Users\\silvi\\Documents\\BOOLEAN\\LARAVEL\\bool-bnb\\node_modules\\@babel\\parser\\lib\\index.js:14682:25)\n    at Parser.parse (C:\\Users\\silvi\\Documents\\BOOLEAN\\LARAVEL\\bool-bnb\\node_modules\\@babel\\parser\\lib\\index.js:16689:10)\n    at parse (C:\\Users\\silvi\\Documents\\BOOLEAN\\LARAVEL\\bool-bnb\\node_modules\\@babel\\parser\\lib\\index.js:16741:38)\n    at parser (C:\\Users\\silvi\\Documents\\BOOLEAN\\LARAVEL\\bool-bnb\\node_modules\\@babel\\core\\lib\\parser\\index.js:52:34)\n    at parser.next (<anonymous>)");

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\Users\silvi\Documents\BOOLEAN\LARAVEL\bool-bnb\resources\js\app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! C:\Users\silvi\Documents\BOOLEAN\LARAVEL\bool-bnb\resources\sass\app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });