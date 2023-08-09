/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/components/ButtonSettings.js":
/*!******************************************!*\
  !*** ./src/components/ButtonSettings.js ***!
  \******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _inc_I18n_I18nBlockOptions_json__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../inc/I18n/I18nBlockOptions.json */ "./inc/I18n/I18nBlockOptions.json");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);




const ButtonSettings = _ref => {
  let {
    options
  } = _ref;
  const {
    attributes,
    setAttributes
  } = options;
  return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Panel, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)(_inc_I18n_I18nBlockOptions_json__WEBPACK_IMPORTED_MODULE_2__.button_settings_panel_title.text, 'flwgb'),
    initialOpen: false
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelRow, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.RangeControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)(_inc_I18n_I18nBlockOptions_json__WEBPACK_IMPORTED_MODULE_2__.button_border_radius_text.text, 'flwgb'),
    value: attributes.buttonBorderRadius,
    onChange: val => setAttributes({
      buttonBorderRadius: val
    }),
    min: 0,
    max: 25
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelRow, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.__experimentalBorderControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)(_inc_I18n_I18nBlockOptions_json__WEBPACK_IMPORTED_MODULE_2__.button_border_text.text, 'flwgb'),
    onChange: newButtonBorder => setAttributes({
      buttonBorder: newButtonBorder
    }),
    value: attributes.buttonBorder
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelRow, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.__experimentalText, null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)(_inc_I18n_I18nBlockOptions_json__WEBPACK_IMPORTED_MODULE_2__.button_bg_color_text.text, 'flwgb'))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelRow, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ColorPalette, {
    value: attributes.buttonBgColor,
    onChange: val => setAttributes({
      buttonBgColor: val
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelRow, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl, {
    labelPosition: 'top',
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)(_inc_I18n_I18nBlockOptions_json__WEBPACK_IMPORTED_MODULE_2__.button_font_weight_text.text, 'flwgb'),
    value: attributes.buttonTextFontWeight,
    options: [{
      label: 'Normal',
      value: 'normal'
    }, {
      label: 'Bold',
      value: 'bold'
    }],
    onChange: val => setAttributes({
      buttonTextFontWeight: val
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelRow, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.__experimentalText, null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)(_inc_I18n_I18nBlockOptions_json__WEBPACK_IMPORTED_MODULE_2__.button_text_color_text.text, 'flwgb'))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelRow, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ColorPalette, {
    value: attributes.buttonTextColor,
    onChange: val => setAttributes({
      buttonTextColor: val
    })
  }))));
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (ButtonSettings);

/***/ }),

/***/ "./src/components/InputSettings.js":
/*!*****************************************!*\
  !*** ./src/components/InputSettings.js ***!
  \*****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _inc_I18n_I18nBlockOptions_json__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../inc/I18n/I18nBlockOptions.json */ "./inc/I18n/I18nBlockOptions.json");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);




const InputSettings = _ref => {
  let {
    options
  } = _ref;
  const {
    attributes,
    setAttributes
  } = options;
  return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Panel, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)(_inc_I18n_I18nBlockOptions_json__WEBPACK_IMPORTED_MODULE_2__.input_settings_panel_title.text, 'flwgb'),
    initialOpen: false
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelRow, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.RangeControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)(_inc_I18n_I18nBlockOptions_json__WEBPACK_IMPORTED_MODULE_2__.input_border_radius_text.text, 'flwgb'),
    value: attributes.inputBorderRadius,
    onChange: val => setAttributes({
      inputBorderRadius: val
    }),
    min: 0,
    max: 25
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelRow, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ToggleControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)(_inc_I18n_I18nBlockOptions_json__WEBPACK_IMPORTED_MODULE_2__.show_placeholders_text.text, 'flwgb'),
    help: attributes.showPlaceholders ? 'Show' : 'Hide',
    checked: attributes.showPlaceholders,
    onChange: val => setAttributes({
      showPlaceholders: val
    })
  }))));
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (InputSettings);

/***/ }),

/***/ "./src/components/LabelSettings.js":
/*!*****************************************!*\
  !*** ./src/components/LabelSettings.js ***!
  \*****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _inc_I18n_I18nBlockOptions_json__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../inc/I18n/I18nBlockOptions.json */ "./inc/I18n/I18nBlockOptions.json");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);




const LabelSettings = _ref => {
  let {
    options
  } = _ref;
  const {
    attributes,
    setAttributes
  } = options;
  return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Panel, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)(_inc_I18n_I18nBlockOptions_json__WEBPACK_IMPORTED_MODULE_2__.label_settings_panel_title.text, 'flwgb'),
    initialOpen: false
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelRow, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ToggleControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)(_inc_I18n_I18nBlockOptions_json__WEBPACK_IMPORTED_MODULE_2__.show_labels_text.text, 'flwgb'),
    help: attributes.showLabels ? 'Show' : 'Hide',
    checked: attributes.showLabels,
    onChange: val => setAttributes({
      showLabels: val
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelRow, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl, {
    labelPosition: 'top',
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)(_inc_I18n_I18nBlockOptions_json__WEBPACK_IMPORTED_MODULE_2__.font_weight_and_color_text.text, 'flwgb'),
    value: attributes.textFontWeight,
    options: [{
      label: 'Normal',
      value: 'normal'
    }, {
      label: 'Bold',
      value: 'bold'
    }],
    onChange: val => setAttributes({
      textFontWeight: val
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelRow, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ColorPicker, {
    color: attributes.textColor,
    onChange: val => setAttributes({
      textColor: val
    }),
    enableAlpha: true,
    defaultValue: "#000"
  }))));
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (LabelSettings);

/***/ }),

/***/ "./src/login-form/edit.js":
/*!********************************!*\
  !*** ./src/login-form/edit.js ***!
  \********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Edit)
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _editor_scss__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./editor.scss */ "./src/login-form/editor.scss");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _inc_I18n_I18n_json__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../../inc/I18n/I18n.json */ "./inc/I18n/I18n.json");
/* harmony import */ var _options__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./options */ "./src/login-form/options.js");






function Edit(props) {
  const {
    attributes
  } = props;
  const blockProps = (0,_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.useBlockProps)(props);
  const inputStyle = {
    'border-radius': attributes.inputBorderRadius
  };
  const textStyle = {
    'color': attributes.textColor,
    'font-weight': attributes.textFontWeight
  };
  const buttonStyle = {
    'color': attributes.buttonTextColor,
    'backgroundColor': attributes.buttonBgColor,
    'border-color': attributes.buttonBorder.color,
    'border-style': attributes.buttonBorder.style,
    'border-width': attributes.buttonBorder.width,
    'border-radius': attributes.buttonBorderRadius,
    'font-weight': attributes.buttonTextFontWeight
  };
  return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_options__WEBPACK_IMPORTED_MODULE_5__["default"], {
    options: props
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", blockProps, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "flwgb-form-row"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "flwgb-input-group"
  }, attributes.showLabels && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", {
    className: "flwgb-input-label",
    style: textStyle,
    htmlFor: "flwgb-username-or-email"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)(_inc_I18n_I18n_json__WEBPACK_IMPORTED_MODULE_4__.email_or_username_input_text.text, 'flwgb')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("input", {
    className: "flwgb-input-control",
    id: "flwgb-username-or-email",
    type: "text",
    style: inputStyle,
    placeholder: attributes.showPlaceholders && (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)(_inc_I18n_I18n_json__WEBPACK_IMPORTED_MODULE_4__.email_or_username_placeholder_text.text, 'flwgb')
  }))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "flwgb-form-row"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "flwgb-input-group"
  }, attributes.showLabels && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", {
    className: "flwgb-input-label",
    style: textStyle,
    htmlFor: "flwgb-password"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)(_inc_I18n_I18n_json__WEBPACK_IMPORTED_MODULE_4__.password_input_text.text, 'flwgb')), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("input", {
    className: "flwgb-input-control",
    id: "flwgb-password",
    type: "password",
    style: inputStyle,
    placeholder: attributes.showPlaceholders && (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)(_inc_I18n_I18n_json__WEBPACK_IMPORTED_MODULE_4__.password_placeholder_text.text, 'flwgb')
  }))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "flwgb-form-row"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "flwgb-form-check-group"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("input", {
    id: "flwgb-rememberme",
    checked: "checked",
    type: "checkbox",
    className: "flwgb-form-check-input"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", {
    className: "flwgb-form-check-label",
    htmlFor: "flwgb-rememberme"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)(_inc_I18n_I18n_json__WEBPACK_IMPORTED_MODULE_4__.remember_me_text.text, 'flwgb')))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "flwgb-form-row"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("button", {
    style: buttonStyle,
    type: "submit",
    name: "wp-submit",
    id: "wp-submit",
    className: "flwgb-login-btn flwgb-btn"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)(_inc_I18n_I18n_json__WEBPACK_IMPORTED_MODULE_4__.login_text.text, 'flwgb')))));
}

/***/ }),

/***/ "./src/login-form/index.js":
/*!*********************************!*\
  !*** ./src/login-form/index.js ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./style.scss */ "./src/login-form/style.scss");
/* harmony import */ var _edit__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./edit */ "./src/login-form/edit.js");
/* harmony import */ var _save__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./save */ "./src/login-form/save.js");
/* harmony import */ var _block_json__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./block.json */ "./src/login-form/block.json");
/**
 * Registers a new block provided a unique name and an object defining its behavior.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */


/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * All files containing `style` keyword are bundled together. The code used
 * gets applied both to the front of your site and to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */


/**
 * Internal dependencies
 */




/**
 * Every block starts by registering a new block type definition.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */
(0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__.registerBlockType)(_block_json__WEBPACK_IMPORTED_MODULE_4__.name, {
  /**
   * @see ./edit.js
   */
  edit: _edit__WEBPACK_IMPORTED_MODULE_2__["default"],
  /**
   * @see ./save.js
   */
  save: _save__WEBPACK_IMPORTED_MODULE_3__["default"]
});

/***/ }),

/***/ "./src/login-form/options.js":
/*!***********************************!*\
  !*** ./src/login-form/options.js ***!
  \***********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _components_LabelSettings__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../components/LabelSettings */ "./src/components/LabelSettings.js");
/* harmony import */ var _components_InputSettings__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../components/InputSettings */ "./src/components/InputSettings.js");
/* harmony import */ var _components_ButtonSettings__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../components/ButtonSettings */ "./src/components/ButtonSettings.js");





const Options = _ref => {
  let {
    options
  } = _ref;
  return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.InspectorControls, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components_LabelSettings__WEBPACK_IMPORTED_MODULE_2__["default"], {
    options: options
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components_InputSettings__WEBPACK_IMPORTED_MODULE_3__["default"], {
    options: options
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components_ButtonSettings__WEBPACK_IMPORTED_MODULE_4__["default"], {
    options: options
  }));
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Options);

/***/ }),

/***/ "./src/login-form/save.js":
/*!********************************!*\
  !*** ./src/login-form/save.js ***!
  \********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ save)
/* harmony export */ });
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_0__);
/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */


/**
 * The save function defines the way in which the different attributes should
 * be combined into the final markup, which is then serialized by the block
 * editor into `post_content`.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#save
 *
 * @return {WPElement} Element to render.
 */
function save() {}

/***/ }),

/***/ "./src/login-form/editor.scss":
/*!************************************!*\
  !*** ./src/login-form/editor.scss ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/login-form/style.scss":
/*!***********************************!*\
  !*** ./src/login-form/style.scss ***!
  \***********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "@wordpress/block-editor":
/*!*************************************!*\
  !*** external ["wp","blockEditor"] ***!
  \*************************************/
/***/ ((module) => {

module.exports = window["wp"]["blockEditor"];

/***/ }),

/***/ "@wordpress/blocks":
/*!********************************!*\
  !*** external ["wp","blocks"] ***!
  \********************************/
/***/ ((module) => {

module.exports = window["wp"]["blocks"];

/***/ }),

/***/ "@wordpress/components":
/*!************************************!*\
  !*** external ["wp","components"] ***!
  \************************************/
/***/ ((module) => {

module.exports = window["wp"]["components"];

/***/ }),

/***/ "@wordpress/element":
/*!*********************************!*\
  !*** external ["wp","element"] ***!
  \*********************************/
/***/ ((module) => {

module.exports = window["wp"]["element"];

/***/ }),

/***/ "@wordpress/i18n":
/*!******************************!*\
  !*** external ["wp","i18n"] ***!
  \******************************/
/***/ ((module) => {

module.exports = window["wp"]["i18n"];

/***/ }),

/***/ "./inc/I18n/I18n.json":
/*!****************************!*\
  !*** ./inc/I18n/I18n.json ***!
  \****************************/
/***/ ((module) => {

module.exports = JSON.parse('{"hello_text":{"text":"Hello","context":"hello_text"},"select_text":{"text":"Please select...","context":"select_text"},"yes_text":{"text":"Yes","context":"yes_text"},"no_text":{"text":"No","context":"no_text"},"loading_text":{"text":"Loading...","context":"loading_text"},"general_error_message":{"text":"Something went wrong. Please try again later.","context":"general_error_message"},"general_success_message":{"text":"Operation has been completed successfully.","context":"general_success_message"},"login_text":{"text":"Login","context":"login_text"},"logout_text":{"text":"Logout","context":"logout_text"},"submit_text":{"text":"Submit","context":"submit_text"},"go_to_user_dashboard_text":{"text":"Go to user dashboard","context":"go_to_user_dashboard_text"},"user_first_name_text":{"text":"First Name (optional)","context":"user_first_name_text"},"user_first_name_placeholder_text":{"text":"Enter your first name","context":"user_first_name_placeholder_text"},"user_last_name_text":{"text":"Last Name (optional)","context":"user_last_name_text"},"user_last_name_placeholder_text":{"text":"Enter your last name","context":"user_last_name_placeholder_text"},"user_bio_text":{"text":"Bio (optional)","context":"user_bio_text"},"user_bio_placeholder_text":{"text":"Your short biography","context":"user_bio_placeholder_text"},"user_website_text":{"text":"Website Url (optional)","context":"user_website_text"},"user_website_placeholder_text":{"text":"Enter your website url","context":"user_website_placeholder_text"},"user_update_button_text":{"text":"Update User","context":"user_update_button_text"},"email_input_text":{"text":"Your e-mail","context":"email_input_text"},"email_placeholder_text":{"text":"Enter your e-mail","context":"email_placeholder_text"},"username_input_text":{"text":"Username","context":"user_input_text"},"username_placeholder_text":{"text":"Enter your username","context":"username_placeholder_text"},"email_or_username_input_text":{"text":"Username or E-mail","context":"email_or_username_input_text"},"email_or_username_placeholder_text":{"text":"Enter your username or e-mail","context":"email_or_username_placeholder_text"},"password_input_text":{"text":"Password","context":"password_input_text"},"password_placeholder_text":{"text":"Enter your password","context":"password_placeholder_text"},"password_again_input_text":{"text":"Password Again","context":"password_again_input_text"},"password_again_placeholder_text":{"text":"Enter your password again","context":"password_again_placeholder_text"},"new_password_input_text":{"text":"New Password","context":"password_input_text"},"new_password_placeholder_text":{"text":"Enter your new password","context":"password_placeholder_text"},"new_password_again_input_text":{"text":"New Password Again","context":"password_input_text"},"new_password_again_placeholder_text":{"text":"Enter your new password again","context":"password_placeholder_text"},"current_password_input_text":{"text":"Current Password","context":"current_password_input_text"},"current_password_placeholder_text":{"text":"Enter your current_password","context":"current_password_placeholder_text"},"current_password_error":{"text":"Your current password is wrong. Please check it again.","context":"current_password_error"},"reset_password_button_text":{"text":"Lost Password","context":"reset_password_button_text"},"reset_password_alert_for_non_logged_in_users":{"text":"This form is only shown for users who are not logged in.","context":"reset_password_alert_for_non_logged_in_users"},"submit_reset_password_button_text":{"text":"Change Password","context":"submit_reset_password_button_text"},"register_button_text":{"text":"Register","context":"register_button_text"},"mail_error_message":{"text":"wp_mail() returned an error. Please check your e-mail configurations.","context":"mail_error_message"},"admin_general_settings":{"text":"General Settings","context":"admin_general_settings"},"admin_mail_settings":{"text":"E-Mail Templates","context":"admin_mail_settings"},"redirect_page_after_login":{"text":"Redirection Page After Login","context":"redirect_page_after_login"},"login_page":{"text":"Login Page","context":"login_page"},"login_page_description":{"text":"Select a page if created a login page.","context":"login_page"},"redirect_page_after_login_description":{"text":"Select a page if you want to redirect users to home page after logged in.","context":"redirect_page_after_login_description"},"lost_password_page":{"text":"Lost (Reset) Password Page","context":"lost_password_page"},"registration_page":{"text":"Registration Page","context":"registration_page"},"activation_page":{"text":"User Activation Page","context":"activation_page"},"activation_page_description":{"text":"Select a page if you selected \'Yes\' in the \'Enable user activation\' setting","context":"activation_page_description"},"user_settings_page":{"text":"User Settings Page","context":"user_settings_page"},"user_settings_page_description":{"text":"Select a page if you selected \'Yes\' in the \'Enable user settings\' setting","context":"user_settings_page_description"},"terms_and_conditions_page":{"text":"Terms and Conditions Page","context":"terms_and_conditions_page"},"privacy_policy_page":{"text":"Privacy Policy Page","context":"privacy_policy_page"},"has_activation":{"text":"Enable user activation","context":"has_activation"},"has_activation_description":{"text":"If you want to send an activation code to your users, select \'Yes\'.","context":"has_activation_description"},"has_user_settings":{"text":"Enable user settings","context":"has_user_settings"},"has_user_settings_description":{"text":"If you want to show a user settings page, select Yes. (Don\'t forget to select a User Settings page below)","context":"has_user_settings_description"},"already_logged_in_message":{"text":"You have already logged in.","context":"already_logged_in_message"},"remember_me_text":{"text":"Remember me","context":"remember_me_text"},"invalid_username_or_pass":{"text":"Invalid username or password.","context":"invalid_username_or_pass"},"login_successful":{"text":"You have successfully logged in...","context":"login_successful"},"login_attempts_error":{"text":"You have made too many unsuccessful login attempts. Please wait %s %s.","context":"login_attempts_error: 1) duration limit 2) duration type (second or minute)"},"limit_login_settings":{"text":"Limit Login","context":"limit_login_settings"},"enable_limit_login":{"text":"Enable limit login","context":"enable_limit_login"},"enable_limit_login_description":{"text":"Protect your web site from too many unsuccessful login attempts.","context":"enable_limit_login_description"},"limit_login_max_attempt":{"text":"Maximum number of attempts","context":"limit_login_max_attempt"},"limit_login_lockout_duration":{"text":"Lockout duration (as seconds)","context":"limit_login_lockout_duration"},"user_not_activated":{"text":"Please activate your account. We sent you an email. Click the activation link in the email.","context":"user_not_activated"},"your_account_has_activated":{"text":"Your account has activated successfully. You can sign in.","context":"your_account_has_activated"},"wrong_activation_code":{"text":"Wrong activation code. Please contact with your site administrator.","context":"wrong_activation_code"},"user_already_activated":{"text":"This account has already activated.","context":"user_already_activated"},"user_activation_block_description":{"text":"This is a placeholder for the USER ACTIVATION BLOCK. Go to the front end of the page to preview the activation result.","context":"user_activation_block_description"},"welcome_card_block_description":{"text":"This is a placeholder for the WELCOME CARD BLOCK to display a welcome card for logged in users. Card has a logout button... Go to the front end of the page to preview the activation result.","context":"welcome_card_block_description"},"terms_and_conditions_text":{"text":"I have read and accept <a href=\\"%s\\" target=\\"_blank\\">terms and conditions</a> and <a href=\\"%s\\" target=\\"_blank\\">privacy policy</a>","context":"terms_and_conditions_text"},"terms_and_conditions_text_plain":{"text":"I have read and accept terms and conditions and privacy policy.","context":"terms_and_conditions_text_plain"},"password_match_error":{"text":"Your passwords do not match","context":"password_match_error"},"register_form_step_1":{"text":"Step 1","context":"register_form_step_1"},"register_form_step_1_title":{"text":"Password Reset Request Form","context":"register_form_step_1_title"},"register_form_step_2":{"text":"Step 2","context":"register_form_step_2"},"register_form_step_2_title":{"text":"Change Password Form","context":"register_form_step_2_title"},"register_succession_with_activation":{"text":"You have been sign up successfuly. Please click the membership activation link sent your e-mail.","context":"register_succession_with_activation"},"register_succession":{"text":"You have been sign up successfuly. You can sign in with your username and password.","context":"register_succession"},"register_mail_to_user":{"text":"Registration Mail Template for User","context":"register_mail_to_user"},"register_mail_to_user_with_activation":{"text":"Registration Mail Template for User (With Activation Code)","context":"register_mail_to_user_with_activation"},"register_mail_to_admin":{"text":"Registration Mail Template for Admin","context":"register_mail_to_admin"},"username_exist_error":{"text":"This username already exist.","context":"username_exist_error"},"user_exist_error":{"text":"This user already exist.","context":"user_exist_error"},"password_changed_confirmation":{"text":"Your password has been changed. Please sign in...","context":"password_changed_confirmation"},"wrong_reset_password_link":{"text":"Wrong reset password link. Please check your reset link sent to your e-mail address or send a new request.","context":"wrong_reset_password_link"},"reset_password_request_confirmation":{"text":"We have successfully get your request. We have sent you an e-mail. Please check your inbox...","context":"reset_password_request_confirmation"},"reset_password_request_input_text":{"text":"Please sumbit your e-mail to get reset password link.","context":"reset_password_request_input_text"},"reset_password_request_mail_to_user":{"text":"Password Reset Request Mail Template","context":"reset_password_request_mail_to_user"},"send_reset_request":{"text":"Send Request","context":"send_reset_request"},"send_reset_request_description":{"text":"Please enter your e-mail address. We will send you an e-mail to reset your password.","context":"send_reset_request_description"},"reset_password_request_mail_to_user_template":{"text":"Hello {{username}}, <br> You can change your password from the link below <br> {{reset_link}} <br> Thanks for your attention.","context":"reset_password_request_mail_to_user_template"},"reset_request_mail_title":{"text":"Reset Password Request","context":"reset_request_mail_title"},"reset_password_mail_title":{"text":"Your Password Changed","context":"reset_password_mail_title"},"reset_password_mail_to_user":{"text":"Password Change Mail Template for User","context":"reset_password_mail_to_user"},"reset_password_mail_to_user_template":{"text":"Hello {{username}}, <br> This notice confirms that your password was changed. If you did not change your password, please contact the Site Administrator.","context":"reset_password_mail_to_user_template"},"register_mail_to_user_template":{"text":"Hello {{username}}, <br> Welcome to our website.","context":"register_mail_to_user_template"},"register_mail_to_user_template_with_activation":{"text":"Hello {{username}}. You have been sign up successfully. Please click the membership activation link below: <br/> {{activation_link}}","context":"register_mail_to_user_template_with_activation"},"register_mail_to_admin_template":{"text":"New member registered to your web site. <br> Username: {{username}} | User E-Mail: {{email}}","context":"register_mail_to_admin_template"},"register_mail_title_to_user":{"text":"Welcome to Join Us","context":"register_mail_title_to_user"},"register_mail_title_to_admin":{"text":"New Member Registration","context":"register_mail_title_to_admin"},"mail_error_information_mail_title":{"text":"Failed to Send E-Mail","context":"mail_error_information_mail_title"},"you_can_use_this_tags_text":{"text":"You can use these tags:","context":"you_can_use_this_tags_text"}}');

/***/ }),

/***/ "./inc/I18n/I18nBlockOptions.json":
/*!****************************************!*\
  !*** ./inc/I18n/I18nBlockOptions.json ***!
  \****************************************/
/***/ ((module) => {

module.exports = JSON.parse('{"label_settings_panel_title":{"text":"Label Settings","context":"label_settings_panel_title"},"show_labels_text":{"text":"Show labels","context":"show_labels_text"},"font_weight_and_color_text":{"text":"Font Weight & Font Color","context":"font_weight_and_color_input_text"},"input_settings_panel_title":{"text":"Input Settings","context":"input_settings_panel_title"},"input_border_radius_text":{"text":"Input Border Radius","context":"input_border_radius_text"},"show_placeholders_text":{"text":"Show Placeholders","context":"show_placeholders_text"},"button_settings_panel_title":{"text":"Button Settings","context":"button_settings_panel_title"},"button_border_radius_text":{"text":"Button Border Radius","context":"button_border_radius_text"},"button_border_text":{"text":"Button Border","context":"button_border_text"},"button_bg_color_text":{"text":"Button Background Color","context":"button_bg_color_text"},"button_font_weight_text":{"text":"Button Font Weight","context":"button_font_weight_text"},"button_text_color_text":{"text":"Button Text Color","context":"button_text_color_text"}}');

/***/ }),

/***/ "./src/login-form/block.json":
/*!***********************************!*\
  !*** ./src/login-form/block.json ***!
  \***********************************/
/***/ ((module) => {

module.exports = JSON.parse('{"$schema":"https://schemas.wp.org/trunk/block.json","apiVersion":3,"name":"frontend-login-with-gutenberg-blocks/login-form","version":"1.0.0","title":"Login Form","category":"theme","icon":"share-alt2","description":"Display login form","attributes":{"showLabels":{"type":"boolean","default":false},"showPlaceholders":{"type":"boolean","default":false},"textColor":{"type":"string","default":"black"},"textFontWeight":{"type":"string","default":"bold"},"inputBorderRadius":{"type":"number","default":0},"buttonBgColor":{"type":"string","default":"gray"},"buttonTextColor":{"type":"string","default":"black"},"buttonBorder":{"type":"object","default":{"color":"#000","style":"solid","width":"0px"}},"buttonBorderRadius":{"type":"number","default":0},"buttonTextFontWeight":{"type":"string","default":"normal"}},"supports":{"html":false},"textdomain":"login-form","editorScript":"file:./index.js","editorStyle":"file:./index.css","style":"file:./style-index.css"}');

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
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var chunkIds = deferred[i][0];
/******/ 				var fn = deferred[i][1];
/******/ 				var priority = deferred[i][2];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"login-form/index": 0,
/******/ 			"login-form/style-index": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var chunkIds = data[0];
/******/ 			var moreModules = data[1];
/******/ 			var runtime = data[2];
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunkfrontend_login_with_gutenberg_blocks"] = self["webpackChunkfrontend_login_with_gutenberg_blocks"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["login-form/style-index"], () => (__webpack_require__("./src/login-form/index.js")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;
//# sourceMappingURL=index.js.map