!function(){"use strict";var t={5510:function(){!function(t,e){t.fn.rtsbBlock=function(e){var a={overlayCSS:{zIndex:1e3,border:"none",margin:0,padding:0,width:"100%",height:"100%",top:0,left:0,background:"rgb(255, 255, 255)",opacity:.6,cursor:"wait",position:"absolute",color:"#556b2f",backgroundColor:"white"}},s=t.extend({},a,e||{}),r=t.extend({},a.overlayCSS,s.overlayCSS||{});return this.each((function(){var e=t(this);"static"===e.css("position")&&(this.style.position="relative",e.data("rtsb-block.static",!0)),this.style.zoom=1;var a=t('<div class="rtsb-loading-overlay" />').css(r);e.find("> .rtsb-loading-overlay").remove(),e.addClass("rtsb-loading").append(a)}))},t.fn.rtsbUnblock=function(){return this.each((function(){var e=t(this);e.data("rtsb-block","static")&&e.css("position","static"),e.removeClass("rtsb-loading").find("> .rtsb-loading-overlay").remove()}))},e.RtsbModal=function(e){this.settings=t.extend({wrapClass:"",footer:!0,header:!0,bodyClass:"",maxWidth:900},e),this.modal_wrapper_element=t("<div class='rtsb-ui-modal'><div class='rtsb-modal-wrapper'><div class='rtsb-modal-content'><div class='rtsb-modal-header'><div class='rtsb-modal-title'></div> <button class='rtsb-modal-close'><i class='notice-dismiss' aria-hidden='true'></i></button></div><div class='rtsb-modal-body'></div><div class='rtsb-modal-footer'></div></div></div><div class='rtsb-mask-wrapper'></div></div>"),this.show=function(){t(document).trigger("rtsb.rtsbModal.show"),this.addModal()},this.addModal=function(){var e=this;return t("body").append(this.modal_wrapper_element),this.wrapper=t(".rtsb-modal-wrapper",this.modal_wrapper_element),this.container=t(".rtsb-modal-content",this.modal_wrapper_element),this.header=t(".rtsb-modal-header",this.modal_wrapper_element),this.header_title=t(".rtsb-modal-title",this.header),this.close_button=t(".rtsb-modal-close",this.header),this.body=t(".rtsb-modal-body",this.modal_wrapper_element),this.footer=t(".rtsb-modal-footer",this.modal_wrapper_element),this.settings.wrapClass&&this.wrapper.addClass(this.settings.wrapClass),!1===this.settings.header&&this.header.remove(),!1===this.settings.title&&this.header_title.remove(),!1===this.settings.close&&this.close_button.remove(),!1===this.settings.footer&&this.footer.remove(),this.settings.maxWidth&&this.wrapper.css({maxWidth:parseInt(this.settings.maxWidth,10)+"px"}),t("body").addClass("rtsb-modal-open"),this.settings.bodyClass&&t("body").addClass(this.settings.bodyClass),t("body > .rtsb-ui-modal").css("display",""),t(".rtsb-mask-wrapper, .rtsb-modal-close",this.modal_wrapper_element).on("click",(function(){e.removeModel()})),this},this.addLoading=function(){return this.wrapper.removeClass("rtsb-modal-loaded"),this},this.addTitle=function(t){this.header_title.html(t)},this.removeLoading=function(){return this.wrapper.addClass("rtsb-modal-loaded"),this},this.removeModel=function(){return t(document).trigger("rtsb.rtsbModal.close",this.modal_wrapper_element),t("body > .rtsb-ui-modal").fadeOut(150),setTimeout((function(){t("body > .rtsb-ui-modal").remove()}),150),t("body").removeClass("rtsb-modal-open"),this.settings.bodyClass&&t("body").removeClass(this.settings.bodyClass),this},this.close=function(){return this.removeModel(),this},this.content=function(t){return this.body.html(t),this},this.appendContent=function(t){return this.body.append(t),this},this.prependContent=function(t){return this.body.prepend(t),this},this.addFooterContent=function(t){return this.footer.html(t),this}}}(jQuery,window)}},e={};function a(s){var r=e[s];if(void 0!==r)return r.exports;var o=e[s]={exports:{}};return t[s](o,o.exports,a),o.exports}a(5510),function(t){t(document).ready((function(){e.linkAction(),e.modalAction(),e.buttonsAction()}));var e={linkAction:function(){t("body.post-type-rtsb_builder").find(".page-title-action").attr("href","#")},modal:function(){t("body.post-type-rtsb_builder #wpcontent").on("click",'.page-title-action, .row-title, .row-actions [class="edit"] a',(function(e){e.preventDefault();var a=t(e.target).attr("href"),s=0,r="";if(a){var o=a.slice(a.indexOf("?")+1).split("&");o&&o[0].split("=")[1]&&(s=parseInt(o[0].split("=")[1]))}s&&(r="saved-template rtsb-edit-template");var i=new RtsbModal({footer:!0,wrapClass:"heading template-builder-popups "+r}),n={action:"rtsb_builder_modal_template",post_id:s||null,__rtsb_wpnonce:rtsbParams.__rtsb_wpnonce};t.ajax({url:rtsbParams.ajaxurl,data:n,type:"POST",beforeSend:function(){i.addModal().addLoading()},success:function(e){i.removeLoading(),i.addTitle(e.title),e.success&&(i.content(e.content),i.addFooterContent(e.footer),t(document).trigger("rtsb.Builder.Modal.Change"))},error:function(t){}})}))},closeModal:function(){t(document).on("rtsb.rtsbModal.close",(function(e,a){"saved"==t(a).find(".template-builder-popups .rtsb-modal-close").attr("data-save")&&location.reload()}))},productSearch:function(){t("#rtsb_product_page_preview, #rtsb_page_for_the_products ").select2({placeholder:"Select product",minimumInputLength:4,allowClear:!0,ajax:{url:rtsbParams.ajaxurl,data:function(t){return{action:"rtsb_modal_product_search",search:t.term?t.term:null,__rtsb_wpnonce:rtsbParams.__rtsb_wpnonce}},processResults:function(t,e){return{results:t.data.items}},cache:!0}})},categorySearch:function(){t("#rtsb_page_for_the_categories").select2({placeholder:"Select Category",minimumInputLength:3,allowClear:!0,ajax:{url:rtsbParams.ajaxurl,data:function(t){return{action:"rtsb_modal_category_search",search:t.term?t.term:null,__rtsb_wpnonce:rtsbParams.__rtsb_wpnonce}},processResults:function(t,e){return{results:t.data.items}},cache:!0}})},onModalChange:function(){t(document).on("rtsb.Builder.Modal.Change",(function(){var a=t("body.post-type-rtsb_builder").find("#rtsb_tb_template_type"),s=t("body.post-type-rtsb_builder").find(".rtsb-product-page-field"),r=t("body.post-type-rtsb_builder").find(".rtsb-categories-page-field"),o=t("#modallabelPrefix");if(s.slideUp(),r.slideUp(),a){t("body").find(".rtsb-import-layout").removeAttr("disabled");var i=a.val(),n=t("body").find(".set-default-layout"),d=n.find(".layout-container[data-layout-type="+i+"]").length;n.find(".layout-container").not(".type-default").hide(),n.find(".layout-container[data-layout-type="+i+"]").show(),"product"===i?(s.slideDown(),e.productSearch()):"archive"===i&&(r.slideDown(),e.categorySearch(),n.find(".layout-container[data-layout-type=shop]").show(),d+=n.find(".layout-container[data-layout-type=shop]").length);var l=a.find("option[value='"+i+"']").text();o.html(" -  "+l+' <span class="template-count">('+d+")</span>")}}))},button:function(){t("body.post-type-rtsb_builder").on("click",".rtsb-import-layout",(function(e){e.preventDefault();var a=t(this),s=a.parents(".template-builder-popups"),r=a.parents(".layout-container").find('input[name="import_default_layout"]').val(),o=s.find("#rtsb_tb_template_name"),i=o.val(),n=s.find("#rtsb_tb_template_type").val(),d=s.find("#default_template:checked").val(),l=s.find("#page_id").val(),p=s.find("#rtsb_tb_template_edit_with").val(),c=s.find("#rtsb_product_page_preview").val(),u=s.find("#rtsb_page_for_the_products").val(),b=s.find("#rtsb_page_for_the_categories").val(),m=s.find(".rtsb-modal-body"),h=a.parents(".layout-container").find(".import-label"),_=h.data("label"),f={action:"rtsb_builder_create_template",page_id:l||null,page_name:i||null,page_type:n||null,preview_product_id:c||null,the_products:u||[],category_archive:b||[],default_template:d||null,template_edit_with:p||null,import_default_layout:r||null,__rtsb_wpnonce:rtsbParams.__rtsb_wpnonce,hasPro:rtsbParams.hasPro};i?(o.next(".message").hide(),t.ajax({url:rtsbParams.ajaxurl,data:f,type:"POST",beforeSend:function(){s.addClass("let-me-import"),a.parents(".rtsb-tb-button-wrapper").addClass("active").append('<div class="rtsb-tb-loader rtsb-ball-clip-rotate"><div></div></div>'),t(".layout-container").removeClass("import-done"),a.parents(".layout-container").addClass("importing").removeClass("import-done"),a.parent(".rtsb-tb-button-wrapper").hasClass("save-button")&&a.text("Saving..."),h.text(_)},success:function(t){s.removeClass("let-me-import"),a.parents(".rtsb-tb-button-wrapper").find(".rtsb-tb-loader").remove(),a.parents(".template-builder-popups").find("#page_id").attr("value",t.post_id),a.parents(".template-builder-popups").addClass("saved-template"),a.parents(".template-builder-popups").find(".rtsb-tb-edit-button-wrapper a").attr("href",t.post_edit_url),a.parents(".template-builder-popups").find(".rtsb-tb-edit-button-wrapper a").html(t.edit_btn_text),a.parents(".template-builder-popups").find("#rtsb_tb_button").attr("disabled","disabled"),a.parents(".template-builder-popups").find(".rtsb-modal-close").attr("data-save","saved"),a.parents(".layout-container").removeClass("importing").addClass("import-done"),a.parents(".layout-container").find(".rtsb-import-layout").attr("disabled","disabled"),a.parents(".rtsb-tb-button-wrapper").removeClass("active"),a.parent(".rtsb-tb-button-wrapper").hasClass("save-button")&&a.text("Save"),h.text("Done!"),a.addClass("success")},error:function(t){console.log(t),s.removeClass("let-me-import"),a.parents(".layout-container").removeClass("importing")}})):m.stop().animate({scrollTop:0},500,"swing",(function(){o.focus().next(".message").show()}))}))},switch:function(){t("body.post-type-rtsb_builder").on("click","td.column-set_default .rtsb-switch-wrapper",(function(e){e.preventDefault();var a=t(this),s=a.find(".rtsb_set_default:checked").val(),r=a.find(".rtsb_set_default").val(),o=a.find(".rtsb_template_type").data("template_type"),i=a.find(".specific-product").data("specific_product"),n=a.find(".specific-category").data("specific_category"),d=o;i&&i.length&&(d="template-"+r+"-specific-products"),n&&n.length&&(d="template-"+r+"-specific-category");var l=".page-type-"+d;t("body").find(l).each((function(){t(this).find(".rtsb_set_default").prop("checked",!1)})),a.find(".rtsb-loader").addClass("rtsb-slider-loading");var p={action:"rtsb_default_template",page_id:r,set_default_page_id:s?0:r,specific_product:i,template_type:o||null,__rtsb_wpnonce:rtsbParams.__rtsb_wpnonce};t.ajax({url:rtsbParams.ajaxurl,data:p,type:"POST",success:function(t){t.success&&parseInt(t.data.post_id)&&a.find(".rtsb_set_default").prop("checked",!0),a.find(".rtsb-loader").removeClass("rtsb-slider-loading")},error:function(t){console.log(t)}})}))},disableButton:function(){t("body").on("change input",".template-builder-popups .rtsb-field",(function(){t("body").find(".rtsb-import-layout").removeAttr("disabled"),t("body").find(".template-builder-popups").removeClass("saved-template")}))},detectTemplateChange:function(){t("body.post-type-rtsb_builder").on("change","#rtsb_tb_template_type, #rtsb_tb_template_edit_with",(function(e){e.preventDefault(),t(document).trigger("rtsb.Builder.Modal.Change")}))},modalAction:function(){e.modal(),e.closeModal(),e.detectTemplateChange(),e.onModalChange()},buttonsAction:function(){e.button(),e.switch(),e.disableButton()}}}(jQuery)}();