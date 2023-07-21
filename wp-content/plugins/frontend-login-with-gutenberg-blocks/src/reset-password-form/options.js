import {__} from '@wordpress/i18n';
import {InspectorControls} from '@wordpress/block-editor';
import {
	ToggleControl,
	ColorPicker,
	SelectControl,
	Panel,
	RangeControl,
	PanelBody,
	PanelRow,
	TextareaControl,
	ColorPalette,
	__experimentalText as Text,
	__experimentalBorderControl as BorderControl
} from '@wordpress/components';

//TODO translate label texts

const Options = ({options}) => {

	const {attributes, setAttributes} = options;

	return (
		<InspectorControls>
			<Panel>
				<PanelBody title={__('Label Settings', 'flwgb')} initialOpen={false}>
					<PanelRow>
						<ToggleControl
							label={__('Show labels', 'flwgb')}
							help={
								attributes.showLabels
									? 'Show'
									: 'Hide'
							}
							checked={attributes.showLabels}
							onChange={(val) => setAttributes({showLabels: val})}
						/>
					</PanelRow>
					<PanelRow>
						<SelectControl labelPosition={'top'}
									   label={__('Font Weight & Font Color', 'flwgb')}
									   value={attributes.textFontWeight}
									   options={[
										   {label: 'Normal', value: 'normal'},
										   {label: 'Bold', value: 'bold'},
									   ]}
									   onChange={(val) => setAttributes({textFontWeight: val})}
						/>
					</PanelRow>
					<PanelRow>
						<ColorPicker
							color={attributes.textColor}
							onChange={(val) => setAttributes({textColor: val})}
							enableAlpha
							defaultValue="#000"
						/>
					</PanelRow>
				</PanelBody>
			</Panel>

			<Panel>
				<PanelBody title={__('Input Settings', 'flwgb')} initialOpen={false}>
					<PanelRow>
						<RangeControl
							label={__('Input Border Radius', 'flwgb')}
							value={attributes.inputBorderRadius}
							onChange={(val) => setAttributes({inputBorderRadius: val})}
							min={0}
							max={25}
						/>
					</PanelRow>
					<PanelRow>
						<ToggleControl
							label={__('Show Placeholders', 'flwgb')}
							help={
								attributes.showPlaceholders
									? 'Show'
									: 'Hide'
							}
							checked={attributes.showPlaceholders}
							onChange={(val) => setAttributes({showPlaceholders: val})}
						/>
					</PanelRow>
				</PanelBody>
			</Panel>

			<Panel>
				<PanelBody title={__('Button Settings', 'flwgb')} initialOpen={false}>
					<PanelRow>
						<RangeControl
							label={__('Button Border Radius', 'flwgb')}
							value={attributes.buttonBorderRadius}
							onChange={(val) => setAttributes({buttonBorderRadius: val})}
							min={0}
							max={25}
						/>
					</PanelRow>
					<PanelRow>
						<BorderControl
							label={__('Button Border')}
							onChange={(newButtonBorder) => setAttributes({buttonBorder: newButtonBorder})}
							value={attributes.buttonBorder}
						/>
					</PanelRow>
					<PanelRow>
						<Text>{__('Button background color', 'flwgb')}</Text>
					</PanelRow>
					<PanelRow>
						<ColorPalette
							value={attributes.buttonBgColor}
							onChange={(val) => setAttributes({buttonBgColor: val})}
						/>
					</PanelRow>
					<PanelRow>
						<SelectControl labelPosition={'top'}
									   label={__('Button Font Weight', 'flwgb')}
									   value={attributes.buttonTextFontWeight}
									   options={[
										   {label: 'Normal', value: 'normal'},
										   {label: 'Bold', value: 'bold'},
									   ]}
									   onChange={(val) => setAttributes({buttonTextFontWeight: val})}
						/>
					</PanelRow>
					<PanelRow>
						<Text>{__('Button text color', 'flwgb')}</Text>
					</PanelRow>
					<PanelRow>
						<ColorPalette
							value={attributes.buttonTextColor}
							onChange={(val) => setAttributes({buttonTextColor: val})}
						/>
					</PanelRow>

				</PanelBody>
			</Panel>

			<Panel>
				<PanelBody title={__('Description Settings', 'flwgb')} initialOpen={false}>
					<PanelRow>
						<ToggleControl
							label={__('Show Description', 'flwgb')}
							help={
								attributes.showPlaceholders
									? 'Show'
									: 'Hide'
							}
							checked={attributes.showDescription}
							onChange={(val) => setAttributes({showDescription: val})}
						/>
					</PanelRow>
					<PanelRow>
						<TextareaControl
							label="Description"
							value={attributes.description}
							onChange={(val) => setAttributes({description: val})}
						/>
					</PanelRow>

				</PanelBody>
			</Panel>
		</InspectorControls>
	)
}

export default Options;
