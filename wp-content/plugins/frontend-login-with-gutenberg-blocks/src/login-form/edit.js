import './editor.scss';
import {useBlockProps} from '@wordpress/block-editor';
import {__} from '@wordpress/i18n';
import {
	ToggleControl,
	ColorPicker,
	SelectControl,
	Panel,
	RangeControl,
	PanelBody,
	PanelRow,
	__experimentalNumberControl as NumberControl
} from '@wordpress/components';

import ControlPanel from "./control-panel/controlPanel";


export default function Edit(props) {

	const {
		attributes: {
			showLabels,
			showPlaceholders,
			textColor,
			textFontWeight,
			inputBorderRadius,
			buttonBgColor,
			buttonTextColor,
			buttonBorder,
			buttonBorderRadius,
		}, setAttributes
	} = props;

	const blockProps = useBlockProps(props);

	const wrapperStyle = {
		'border': '1px dotted lightgray'
	}

	const inputStyle = {
		'width': '100%',
		'border-radius': inputBorderRadius,
		'margin-bottom': '10px',
		'margin-top': '10px'
	}

	const textStyle = {
		'color': textColor,
		'font-weight': textFontWeight
	}

	const buttonStyle = {
		'color': buttonTextColor,
		'backgroundColor': buttonBgColor,
		'margin-top': '10px',
		'width': '100%',
		'border-color':buttonBorder.color,
		'border-style':buttonBorder.style,
		'border-width':buttonBorder.width,
		'border-radius': buttonBorderRadius,
		'padding': '10px'
	}

	return (

		<>
			<ControlPanel options={props}/>
			<div style={wrapperStyle} {...useBlockProps()}>

				<div className="flwgb-form-row">
					<div className="flwgb-input-group">
						{showLabels &&
							<label style={textStyle} htmlFor="usr_or_ml">{__('Username or E-mail', 'flwgb')}</label>}
						<input id="usr_or_ml" type="text" style={inputStyle}
							   placeholder={showPlaceholders && __('Enter your username or e-mail', 'flwgb')}/>
					</div>
				</div>

				<div className="flwgb-form-row">
					<div className="flwgb-input-group">
						{showLabels && <label style={textStyle} htmlFor="psswrd">{__('Password', 'flwgb')}</label>}
						<input id="psswrd" type="password" style={inputStyle}
							   placeholder={showPlaceholders && __('Enter your password', 'flwgb')}/>
					</div>
				</div>


				<div className="flwgb-form-row">
					<div className="flwgb-input-group">
						<input id="rmbrme" checked="checked" type="checkbox" className="form-check-input"/>
						<label style={textStyle} htmlFor="rmbrme">Remember me</label>
					</div>
				</div>

				<div className="text-center">
					<button style={buttonStyle} type="submit" name="wp-submit" id="wp-submit" className="flwgb-btn">
						{__('Submit', 'flwgb')}
					</button>
				</div>

			</div>
		</>

	);
}
