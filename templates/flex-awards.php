<?php
/**
 * ACF Flexible Layout: Awards
 */
$title = $args['title'] ?? '';
$subtitle = $args['subtitle'] ?? '';
$left_image = $args['left_image'] ?? '';
$form_shortcode = $args['form_shortcode'] ?? '';
?>

<style>
    .form-custom .form-group {
        position: relative;
        margin-bottom: 40px;
    }

.form-custom .form-group p {
  position: relative;
  margin: 0;
}

.form-custom .form-group input, .form-custom .form-group textarea, .form-custom .form-group select {
  height: 45px;
  width: 100%;
  border: none;
  border-bottom: 1px solid #3C3C3C;
  padding: 12px 0 8px;
  font-size: 16px;
  font-family: "Archivo", sans-serif;
  color: #000;
  background: transparent;
  transition: border-color 0.3s;
}

.form-custom .form-group input:focus, .form-custom .form-group textarea:focus {
  outline: none;
  border-bottom-color: #041421;
}

.form-custom .form-group label {
  position: absolute;
  left: 0;
  top: 50%;
  transform: translateY(-50%);
  color: rgba(0,0,0,0.5);
  font-size: 16px;
  font-family: "Archivo", sans-serif;
  font-weight: 300;
  pointer-events: none;
  transition: all 0.25s ease;
}

.form-custom .form-group p:has(input:focus) label,
.form-custom .form-group p:has(input[value]:not([value=""])) label,
.form-custom .form-group p:has(select) label,
.form-custom .form-group p:has(textarea:focus) label {
  top: -6px;
  font-size: 13px;
  color: #041421;
}

.form-custom .wpcf7-submit {
    background:linear-gradient(90deg, #0065CA 0%, #37B6FF 100%);
    display: flex;
    justify-content: center;
    align-items: center;
    text-transform: uppercase;
    color: white;
    font-family: "Archivo";
    font-size: 18px;
    line-height: 18px;
    padding: 22px 93px;
    font-weight: 400;
}
.form-custom textarea {
    resize: none;
}

.form-custom .info-label {
    margin-bottom: 20px;
}

.form-custom .subm p {
    display: inline-flex;
    flex-direction: column-reverse;
}

</style>

<section class="py-[90px]">
    <div class="w-[calc(100%-6%)] mx-auto h-[1px] bg-[#DDDDDD] mt-[87px]"></div>
    <div class="pr-[calc((100%-1296px)/2)] flex justify-between gap-[65px] mt-[90px]">
        <img src="<?php echo $left_image; ?>" alt="img" class="img min-h-full min-w-[452px] w-[452px]">
        <div class="form-custom w-full">
            <h2 class="text-h2 uppercase leading-h2 font-light font-archivo text-[#0B0B0B] max-w-[678px] mb-[20px]"><?= esc_html($title) ?></h2>
            <h4 class="font-archivo font-light text-h4 leading-h4 text-[#0B0B0B] mb-[60px] uppercase"><?= esc_html($subtitle) ?></h5>
            <?php echo do_shortcode($form_shortcode); ?>
        </div>
    </div>
    <div class="w-[calc(100%-6%)] mx-auto h-[1px] bg-[#DDDDDD] mt-[87px]"></div>
</section>