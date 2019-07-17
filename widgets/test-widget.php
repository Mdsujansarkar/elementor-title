<?php
class Elementor_Test_Widgets extends \Elementor\Widget_Base {

	public function get_name() {
		return 'Text';
	}

	public function get_title() {
		return __( 'Text editor', 'plugin-name' );
	}

	public function get_icon() {
		return 'fa fa-edit';
	}

	public function get_categories() {
		return [ 'general','first-category' ];
	}


	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


		$this->add_control(
			'text',
			[
				'label' => __( 'Text Input', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'text',
				'placeholder' => __( 'heading text', 'plugin-name' ),
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'info_section',
			[
				'label' => __( 'Info', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		
         $this->add_control(
			'class',
			[
				'label' => __( 'Text Input', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'center',
				'options' => [
					'center'  => __( 'center', 'plugin-domain' ),
					'right' => __( 'right', 'plugin-domain' ),
					'left' => __( 'left', 'plugin-domain')
				],
				'selectors' =>[
               '{{WPAPPER}} h1.heading' =>'text-align:{{VALUE}}'
				]
			]
		);
         $this->end_controls_section();
		 $this->start_controls_section(
			'color_section',
			[
				'label' => __( 'Color', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		
         $this->add_control(
			'title-color',
			[
				'label' => __( 'Title Color', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#000000',
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' =>[
               '{{WPAPPER}} h1.heading' =>'color:{{VALUE}}'
				]
			]
		);
		
       $this->end_controls_section();

	   $this->start_controls_section(
			'textarea',
			[
				'label' => __( 'Info Detail', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		
         $this->add_control(
			'textdetails',
			[
				'label' => __( 'Text Input', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => __( 'Default description', 'plugin-domain' ),
				'placeholder' => __( 'Type your description here', 'plugin-domain' ),
				
			]
		);
         $this->end_controls_section();

         $this->start_controls_section(
			'content_image',
			[
				'label' => __( 'Content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

	}
	protected function render() {

		$settings = $this->get_settings_for_display();

		$html = $settings['text'];
		$class = $settings['class'];
		$title = $settings['title-color'];
		$titletext = $settings['textdetails'];
		// $this-> add_inline_editing_attributes('heading','none');
		// $this->add_render_attributes([
  //        'class' => 'heading'
		// ]);

		//echo '<h1 ".$this->get_render_attribute_string('heading')." class="heading">';
		echo '<h1 class="heading">';

		echo ( $html ) ? $html : $settings['text'];

		echo '</h1>';
		echo '<p>';
		echo $titletext;
		echo '</p>';
		echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings );

	}
    protected function _content_template(){
    	?>
          <h1 class="heading">{{{ settings.text}}}</h1>
          <p>{{{settings.textdetails}}}</p>
          <img src="{{ settings.image.url }}">
    	<?php
    }

}