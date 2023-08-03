import {__} from '@wordpress/i18n';
import I18n from "../../inc/I18n/I18nBlockOptions.json";
import {
	__experimentalText as Text,
	__experimentalBorderControl as BorderControl,
	ColorPalette,
	SelectControl,
	RangeControl,
	Panel,
	PanelBody,
	PanelRow
} from '@wordpress/components';

const ButtonSettings = ({options}) => {

	const {attributes, setAttributes} = options;

	return (
		<Panel>
			<PanelBody
				title={__(I18n.button_settings_panel_title.text, 'flwgb')}
				initialOpen={false}
			>
				<PanelRow>
					<RangeControl
						label={__(I18n.button_border_radius_text.text, 'flwgb')}
						value={attributes.buttonBorderRadius}
						onChange={(val) =>
							setAttributes({buttonBorderRadius: val})
						}
						min={0}
						max={25}
					/>
				</PanelRow>
				<PanelRow>
					<BorderControl
						label={__(I18n.button_border_text.text, 'flwgb')}
						onChange={(newButtonBorder) =>
							setAttributes({
								buttonBorder: newButtonBorder,
							})
						}
						value={attributes.buttonBorder}
					/>
				</PanelRow>
				<PanelRow>
					<Text>
						{__(I18n.button_bg_color_text.text, 'flwgb')}
					</Text>
				</PanelRow>
				<PanelRow>
					<ColorPalette
						value={attributes.buttonBgColor}
						onChange={(val) =>
							setAttributes({buttonBgColor: val})
						}
					/>
				</PanelRow>
				<PanelRow>
					<SelectControl
						labelPosition={'top'}
						label={__(I18n.button_font_weight_text.text, 'flwgb')}
						value={attributes.buttonTextFontWeight}
						options={[
							{label: 'Normal', value: 'normal'},
							{label: 'Bold', value: 'bold'},
						]}
						onChange={(val) =>
							setAttributes({buttonTextFontWeight: val})
						}
					/>
				</PanelRow>
				<PanelRow>
					<Text>{__(I18n.button_text_color_text.text, 'flwgb')}</Text>
				</PanelRow>
				<PanelRow>
					<ColorPalette
						value={attributes.buttonTextColor}
						onChange={(val) =>
							setAttributes({buttonTextColor: val})
						}
					/>
				</PanelRow>
			</PanelBody>
		</Panel>
	)

}

export default ButtonSettings;
