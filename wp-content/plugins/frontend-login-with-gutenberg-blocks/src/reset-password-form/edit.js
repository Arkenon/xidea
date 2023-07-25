import './editor.scss';
import {useBlockProps} from '@wordpress/block-editor';
import {useEffect} from '@wordpress/element'
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

	/*function selectForm(form) {
		setAttributes({selectedForm: form})
	}

	useEffect(() => {
		if (newArticles !== oldArticles) {
			setArticles(newArticles)
		}
	}, [attributes.selectedForm])*/

	const formSelectBtnStyles = {
		'cursor': 'pointer', 'border': '1px solid gray', 'padding': '5px','text-decoration':'none'
	}

	return (
		<>

			<Options options={props}/>

			<div {...blockProps}>

				<div style={{'display': 'flex', 'justify-content': 'center', 'align-items': 'center', 'gap':'15px','margin-bottom':'30px'}}>
					<a style={formSelectBtnStyles} onClick={() => setAttributes({selectedForm: 'requestForm'})}>Step 1</a>
					<a style={formSelectBtnStyles} onClick={() => setAttributes({selectedForm: 'changePasswordForm'})}>Step 2</a>
				</div>

				{
					attributes.selectedForm === 'requestForm' &&
					<div>
						<p style={{'text-align':'center','font-weight':'bold'}}>Request Form</p>
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
									   htmlFor="flwgb-email">{__('Your e-mail', 'flwgb')}</label>}
								<input className="flwgb-input-control" id="flwgb-email" type="text"
									   style={inputStyle}
									   placeholder={attributes.showPlaceholders && __('Enter your e-mail', 'flwgb')}/>
							</div>
						</div>


						<div className="flwgb-form-row">
							<button style={buttonStyle} type="submit" name="wp-submit" id="wp-submit"
									className="flwgb-reset-password-btn flwgb-btn">
								{__('Send Request', 'flwgb')}
							</button>
						</div>

					</div>
				}

				{
					attributes.selectedForm === 'changePasswordForm' &&
					<div>
						<p style={{'text-align':'center','font-weight':'bold'}}>Change Password Form</p>
						<div className="flwgb-form-row">
							<div className="flwgb-input-group">
								{attributes.showLabels &&
								<label className="flwgb-input-label" style={textStyle}
									   htmlFor="flwgb-password">{__('Password', 'flwgb')}</label>}
								<input className="flwgb-input-control" id="flwgb-password" type="password"
									   style={inputStyle}
									   placeholder={attributes.showPlaceholders && __('Enter your password', 'flwgb')}/>
							</div>
						</div>

						<div className="flwgb-form-row">
							<div className="flwgb-input-group">
								{attributes.showLabels &&
								<label className="flwgb-input-label" style={textStyle}
									   htmlFor="flwgb-password-again">{__('Password Again', 'flwgb')}</label>}
								<input className="flwgb-input-control" id="flwgb-password-again" type="password"
									   style={inputStyle}
									   placeholder={attributes.showPlaceholders && __('Enter your password again', 'flwgb')}/>
							</div>
						</div>


						<div className="flwgb-form-row">
							<button style={buttonStyle} type="submit" name="wp-submit-pwd" id="wp-submit-pwd"
									className="flwgb-reset-password-btn flwgb-btn">
								{__('Change Password', 'flwgb')}
							</button>
						</div>

					</div>
				}
			</div>


		</>

	);
}
