import {__} from '@wordpress/i18n';
import I18n from "../../inc/I18n/I18nBlockOptions.json";
import {
	ToggleControl,
	ColorPicker,
	SelectControl,
	Panel,
	PanelBody,
	PanelRow
} from '@wordpress/components';

const LabelSettings = ({options}) => {

	const {attributes, setAttributes} = options;

	return (
		<Panel>
			<PanelBody
				title={__(I18n.label_settings_panel_title.text, 'flwgb')}
				initialOpen={false}
			>
				<PanelRow>
					<ToggleControl
						label={__(I18n.show_labels_input_text.text, 'flwgb')}
						help={attributes.showLabels ? 'Show' : 'Hide'}
						checked={attributes.showLabels}
						onChange={(val) =>
							setAttributes({showLabels: val})
						}
					/>
				</PanelRow>
				<PanelRow>
					<SelectControl
						labelPosition={'top'}
						label={__(I18n.font_weight_and_color_input_text.text, 'flwgb')}
						value={attributes.textFontWeight}
						options={[
							{label: 'Normal', value: 'normal'},
							{label: 'Bold', value: 'bold'},
						]}
						onChange={(val) =>
							setAttributes({textFontWeight: val})
						}
					/>
				</PanelRow>
				<PanelRow>
					<ColorPicker
						color={attributes.textColor}
						onChange={(val) =>
							setAttributes({textColor: val})
						}
						enableAlpha
						defaultValue="#000"
					/>
				</PanelRow>
			</PanelBody>
		</Panel>
	)

}

export default LabelSettings;
