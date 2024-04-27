<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
extract($data);

?>

<div class="rt-pricing-tab">
    <div class="text-center">
        <div class="price-switch-box price-switch-box-style-1">
            <span class="pack-name"><?php echo wp_kses_post($data['monthly_text']); ?></span>
            <div class="pricing-switch-container">
              <div class="pricing-switch"></div>
              <div class="pricing-switch pricing-switch-active"></div>
              <div class="switch-button"></div>
            </div>
            <span class="pack-name"><?php echo wp_kses_post($data['yearly_text']); ?></span>            
        </div>
    </div>
    <div class="rt-tab-content" id="nav-tabContent">
        <div class="rt-tab-pane rtTabFadeInUp">
            <div class="row g-4">
                <?php foreach ( $data['feature_monthly'] as $feature_list ) : 
                    $attr = '';
                    if ( !empty( $feature_list['buttonurl']['url'] ) ) {
                        $attr  = 'href="' . $feature_list['buttonurl']['url'] . '"';
                        $attr .= !empty( $feature_list['buttonurl']['is_external'] ) ? ' target="_blank"' : '';
                        $attr .= !empty( $feature_list['buttonurl']['nofollow'] ) ? ' rel="nofollow"' : '';
                    }
                ?>   
                <div class="col-md-4 col-12">
                    <div class="rt-price-tab-box">
                        <div class="price-header">
                            <h3 class="rt-title"><?php echo wp_kses_post( $feature_list['title'] ); ?></h3>
                            <p class="rt-sub-title"><?php echo wp_kses_post( $feature_list['sub_title'] ); ?></p>
                            <h4 class="rt-price"><span class="currency"><?php echo wp_kses_post( $feature_list['currency'] );?></span><?php echo wp_kses_post( $feature_list['price'] );?><span class="price-unit"><?php echo wp_kses_post( $feature_list['unit'] ); ?></span>
                            </h4>
                        </div>
                        <div class="rt-features"><?php echo wp_kses_post( $feature_list['text'] ); ?></div>  
                        <div class="rt-price-button">
                            <a <?php echo $attr; ?> class="button-style-2 btn-common">
                                <?php echo esc_html( $feature_list['buttontext'] );?><i class="icon-quiklearn-right-arrow"></i>
                            </a>
                        </div>      
                    </div>
                </div>
            <?php endforeach; ?> 
            </div>
        </div>
        <div class="rt-tab-pane rtTabFadeInUp">
            <div class="row g-4">
                <?php foreach ( $data['feature_yearly'] as $feature_list2 ) : 
                    $attr2 = '';
                    if ( !empty( $feature_list2['buttonurl2']['url'] ) ) {
                        $attr2  = 'href="' . $feature_list2['buttonurl2']['url'] . '"';
                        $attr2 .= !empty( $feature_list2['buttonurl2']['is_external'] ) ? ' target="_blank"' : '';
                        $attr2 .= !empty( $feature_list2['buttonurl2']['nofollow'] ) ? ' rel="nofollow"' : '';
                    }
                ?>   
                <div class="col-md-4 col-12">
                    <div class="rt-price-tab-box">
                        <div class="price-header">
                            <h3 class="rt-title"><?php echo wp_kses_post( $feature_list2['title2'] ); ?></h3>
                            <p class="rt-sub-title"><?php echo wp_kses_post( $feature_list2['sub_title2'] ); ?></p>
                            <h4 class="rt-price"><span class="currency"><?php echo wp_kses_post( $feature_list2['currency2'] );?></span><?php echo wp_kses_post( $feature_list2['price2'] );?>
                            </h4>
                        </div>
                        <div class="rt-features"><?php echo wp_kses_post( $feature_list2['text2'] ); ?></div>  
                        <div class="rt-price-button">
                            <a <?php echo $attr2; ?> class="button-style-2 btn-common">
                                <?php echo esc_html( $feature_list2['buttontext2'] );?><i class="icon-quiklearn-right-arrow"></i>
                            </a>
                        </div>      
                    </div>
                </div>
                <?php endforeach; ?> 
            </div>
        </div>
    </div>
    <?php if( $data['note_display'] == 'yes' && $data['note_desc'] ) { ?><div class="price-note"><?php echo esc_html( $data['note_desc'] );?></div><?php } ?>
</div>