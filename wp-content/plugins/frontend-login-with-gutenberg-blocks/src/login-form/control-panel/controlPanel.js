import {InspectorControls} from '@wordpress/block-editor';

import {
	ToggleControl,
	ColorPicker,
	SelectControl,
	Panel,
	RangeControl,
	PanelBody,
	PanelRow,
	ColorPalette,
	__experimentalText as Text,
	__experimentalBorderControl as BorderControl
} from '@wordpress/components';

import {__} from '@wordpress/i18n';

const ControlPanel = ({options}) => {

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
	} = options;

	return (
		<InspectorControls>
			<Panel>
				<PanelBody title={__('Label Settings', 'flwgb')} initialOpen={false}>
					<PanelRow>
						<ToggleControl
							label={__('Show labels', 'flwgb')}
							help={
								showLabels
									? 'Show'
									: 'Hide'
							}
							checked={showLabels}
							onChange={(val) => setAttributes({showLabels: val})}
						/>
					</PanelRow>
					<PanelRow>
						<SelectControl labelPosition={'top'}
									   label={__('Font Weight & Font Color', 'flwgb')}
									   value={textFontWeight}
									   options={[
										   {label: 'Normal', value: 'normal'},
										   {label: 'Bold', value: 'bold'},
									   ]}
									   onChange={(val) => setAttributes({textFontWeight: val})}
						/>
					</PanelRow>
					<PanelRow>
						<ColorPicker
							color={textColor}
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
							value={inputBorderRadius}
							onChange={(val) => setAttributes({inputBorderRadius: val})}
							min={0}
							max={25}
						/>
					</PanelRow>
					<PanelRow>
						<ToggleControl
							label={__('Show Placeholders', 'flwgb')}
							help={
								showPlaceholders
									? 'Show'
									: 'Hide'
							}
							checked={showPlaceholders}
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
							value={buttonBorderRadius}
							onChange={(val) => setAttributes({buttonBorderRadius: val})}
							min={0}
							max={25}
						/>
					</PanelRow>
					<PanelRow>
						<BorderControl
							label={__('Button Border')}
							onChange={(newButtonBorder) => setAttributes({buttonBorder: newButtonBorder})}
							value={buttonBorder}
						/>
					</PanelRow>
					<PanelRow>
						<Text>{__('Button background color', 'flwgb')}</Text>
					</PanelRow>
					<PanelRow>
						<ColorPalette
							value={buttonBgColor}
							onChange={(val) => setAttributes({buttonBgColor: val})}
						/>
					</PanelRow>
					<PanelRow>
						<Text>{__('Button text color', 'flwgb')}</Text>
					</PanelRow>
					<PanelRow>
						<ColorPalette
							value={buttonTextColor}
							onChange={(val) => setAttributes({buttonTextColor: val})}
						/>
					</PanelRow>

				</PanelBody>
			</Panel>
		</InspectorControls>
	)
}

export default ControlPanel;
