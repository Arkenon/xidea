import React from "react";
import Slider from "react-slick";
import { useBlockProps } from '@wordpress/block-editor';
import './editor.scss';


export default function Edit(attributes, setAttributes ) {


	var options = {
		dots: true,
		infinite: true,
		speed: 500,
		slidesToShow: 2,
		slidesToScroll: 1
	};

	return (
		<div { ...useBlockProps() }>
			<Slider {...options}>
				<div className="marenda-slick-item">
					<img src="http://localhost/xidea/wp-content/themes/societas/assets/img/services-3.jpg" alt=""/>
				</div>
				<div className="marenda-slick-item">
					<img src="http://localhost/xidea/wp-content/themes/societas/assets/img/services-1.jpg" alt=""/>
				</div>
				<div className="marenda-slick-item">
					<img src="http://localhost/xidea/wp-content/themes/societas/assets/img/services-2.jpg" alt=""/>
				</div>
				<div className="marenda-slick-item">
					<img src="http://localhost/xidea/wp-content/themes/societas/assets/img/why-us.jpg" alt=""/>
				</div>
			</Slider>
		</div>
	);
}
