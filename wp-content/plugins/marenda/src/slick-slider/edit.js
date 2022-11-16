import Slider from "react-slick";
import {InnerBlocks,InspectorControls, useBlockProps} from '@wordpress/block-editor';
import {
	PanelBody,
	PanelRow,
	TextControl,
	__experimentalNumberControl as NumberControl
} from '@wordpress/components';
import './editor.scss';

export default function Edit(props) {

	/*	const template = (
		<div className="marenda-slick-item">
			<img src="http://localhost/xidea/wp-content/themes/societas/assets/img/services-3.jpg" alt=""/>
		</div>
	);

	const slider = (
		<Slider {...options}>
			{template}
			{template}
			{template}
			{template}
		</Slider>
	);*/

	const {attributes: {sliderId,slidesToShow,slidesToScroll}, setAttributes} = props;
	const ALLOWED_BLOCKS = ['core/columns'];

	return (
		<div {...useBlockProps()}>

			<InnerBlocks allowedBlocks={ALLOWED_BLOCKS}/>

			<InspectorControls>
				<PanelBody>
					<PanelRow>
						<TextControl
							label="Slider Id (exp: 'my-slider-1')"
							value={ sliderId }
							onChange={ ( newSliderId ) => setAttributes({sliderId: newSliderId}) }
						/>
					</PanelRow>
					<PanelRow>
						<NumberControl
							label="Slides to show "
							value={ slidesToShow }
							onChange={ ( newSlidesToShow ) => setAttributes({slidesToShow: newSlidesToShow}) }
						/>
					</PanelRow>
					<PanelRow>
						<NumberControl
							label="Slides to scroll "
							value={ slidesToScroll }
							onChange={ ( newSlidesToScroll ) => setAttributes({slidesToScroll: newSlidesToScroll}) }
						/>
					</PanelRow>
				</PanelBody>
			</InspectorControls>

		</div>
	);
}
