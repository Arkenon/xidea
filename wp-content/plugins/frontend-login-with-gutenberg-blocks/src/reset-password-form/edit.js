import './editor.scss';
import {useBlockProps} from '@wordpress/block-editor';
import {__} from '@wordpress/i18n';

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
			buttonTextFontWeight
		}, setAttributes
	} = props;

	const blockProps = useBlockProps(props);

	const inputStyle = {
		'border-radius': inputBorderRadius,
	}

	const textStyle = {
		'color': textColor,
		'font-weight': textFontWeight
	}

	const buttonStyle = {
		'color': buttonTextColor,
		'backgroundColor': buttonBgColor,
		'border-color': buttonBorder.color,
		'border-style': buttonBorder.style,
		'border-width': buttonBorder.width,
		'border-radius': buttonBorderRadius,
		'font-weight': buttonTextFontWeight
	}


	return (
		<>

			<ControlPanel options={props}/>

			<div {...blockProps}>
				<div style={{'text-align':'center'}}>
					<p>{__("Please enter your e-mail address. We will send you an e-mail to reset your password.")}</p>
				</div>
				<div className="flwgb-form-row">
					<div className="flwgb-input-group">
						{showLabels &&
						<label className="flwgb-input-label" style={textStyle}
							   htmlFor="flwgb-email">{__('Your e-mail', 'flwgb')}</label>}
						<input className="flwgb-input-control" id="flwgb-email" type="text"
							   style={inputStyle}
							   placeholder={showPlaceholders && __('Enter your e-mail', 'flwgb')}/>
					</div>
				</div>


				<div className="flwgb-form-row">
					<button style={buttonStyle} type="submit" name="wp-submit" id="wp-submit"
							className="flwgb-reset-password-btn flwgb-btn">
						{__('Send Request', 'flwgb')}
					</button>
				</div>

			</div>

		</>

	);
}
