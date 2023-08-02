import './editor.scss';
import {useBlockProps} from '@wordpress/block-editor';
import {__} from '@wordpress/i18n';
import I18n from "../../inc/I18n/I18n.json";
import Options from "./options";

export default function Edit(props) {

	const {attributes, setAttributes} = props;

	const blockProps = useBlockProps(props);

	const inputStyle = {
		'border-radius': attributes.inputBorderRadius,
	}

	const textStyle = {
		'color': attributes.textColor,
		'font-weight': attributes.textFontWeight
	}

	const buttonStyle = {
		'color': attributes.buttonTextColor,
		'backgroundColor': attributes.buttonBgColor,
		'border-color': attributes.buttonBorder.color,
		'border-style': attributes.buttonBorder.style,
		'border-width': attributes.buttonBorder.width,
		'border-radius': attributes.buttonBorderRadius,
		'font-weight': attributes.buttonTextFontWeight
	}

	const desc = attributes.description ? attributes.description : I18n.send_reset_request_description.text;

	const formSelectBtnStyles = {
		'cursor': 'pointer', 'border': '1px solid gray', 'padding': '5px','text-decoration':'none'
	}

	return (
		<>

			<Options options={props}/>

			<div {...blockProps}>

				<div style={{'display': 'flex', 'justify-content': 'center', 'align-items': 'center', 'gap':'15px','margin-bottom':'30px'}}>
					<a style={formSelectBtnStyles} onClick={() => setAttributes({selectedForm: 'requestForm'})}>{__(I18n.register_form_step_1.text, 'flwgb')}</a>
					<a style={formSelectBtnStyles} onClick={() => setAttributes({selectedForm: 'changePasswordForm'})}>{__(I18n.register_form_step_2.text, 'flwgb')}</a>
				</div>

				{
					attributes.selectedForm === 'requestForm' &&
					<div>
						<p style={{'text-align':'center','font-weight':'bold'}}>{__(I18n.register_form_step_1_title.text, 'flwgb')}</p>
						{
							attributes.showDescription &&
							<div style={{'text-align': 'center'}}>
								<p>{__(desc)}</p>
							</div>
						}
						<div className="flwgb-form-row">
							<div className="flwgb-input-group">
								{attributes.showLabels &&
								<label className="flwgb-input-label" style={textStyle}
									   htmlFor="flwgb-email">{__(I18n.email_input_text.text, 'flwgb')}</label>}
								<input className="flwgb-input-control" id="flwgb-email" type="text"
									   style={inputStyle}
									   placeholder={attributes.showPlaceholders && __(I18n.email_placeholder_text.text, 'flwgb')}/>
							</div>
						</div>


						<div className="flwgb-form-row">
							<button style={buttonStyle} type="submit" name="wp-submit" id="wp-submit"
									className="flwgb-reset-password-btn flwgb-btn">
								{__(I18n.send_reset_request.text, 'flwgb')}
							</button>
						</div>

					</div>
				}

				{
					attributes.selectedForm === 'changePasswordForm' &&
					<div>
						<p style={{'text-align':'center','font-weight':'bold'}}>{__(I18n.register_form_step_2_title.text, 'flwgb')}</p>
						<div className="flwgb-form-row">
							<div className="flwgb-input-group">
								{attributes.showLabels &&
								<label className="flwgb-input-label" style={textStyle}
									   htmlFor="flwgb-password">{__(I18n.password_input_text.text, 'flwgb')}</label>}
								<input className="flwgb-input-control" id="flwgb-password" type="password"
									   style={inputStyle}
									   placeholder={attributes.showPlaceholders && __(I18n.password_placeholder_text.text, 'flwgb')}/>
							</div>
						</div>

						<div className="flwgb-form-row">
							<div className="flwgb-input-group">
								{attributes.showLabels &&
								<label className="flwgb-input-label" style={textStyle}
									   htmlFor="flwgb-password-again">{__(I18n.password_again_input_text.text, 'flwgb')}</label>}
								<input className="flwgb-input-control" id="flwgb-password-again" type="password"
									   style={inputStyle}
									   placeholder={attributes.showPlaceholders && __(I18n.password_again_placeholder_text.text, 'flwgb')}/>
							</div>
						</div>


						<div className="flwgb-form-row">
							<button style={buttonStyle} type="submit" name="wp-submit-pwd" id="wp-submit-pwd"
									className="flwgb-reset-password-btn flwgb-btn">
								{__(I18n.submit_reset_password_button_text.text, 'flwgb')}
							</button>
						</div>

					</div>
				}
			</div>


		</>

	);
}
