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
  .form-custom {
    max-width: fit-content;
  }
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

.form-custom .subm p{
  position: relative;
  overflow:hidden;
}

.form-custom .wpcf7-submit {
  display: inline-block;
  padding: 22px 53px;
  font-family: 'Archivo', sans-serif;
  font-weight: 400;
  text-transform: uppercase;
  line-height: 1.2;
  color: #fff;
  background: linear-gradient(90deg, #0065CA 0%, #37B6FF 100%);
  text-decoration: none;
  transition: all 0.3s ease-in-out;
  overflow: hidden;
  cursor: pointer;
}
.form-custom .wpcf7-submit:hover {
  transform: translateY(-4px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
}

/* shine эффект */
.form-custom .shine {
  content: "";
  position: absolute;
  bottom: 0;
  left: -120%;
  width: 167px;
  height: 64px;
  background: linear-gradient(
    to right,
    rgba(255, 255, 255, 0.4),
    rgba(255, 255, 255, 0.2),
    rgba(255, 255, 255, 0)
  );
  opacity: 0;
  transition: all 0.8s ease-in-out;
  pointer-events: none;
  z-index: 100;
}

.form-custom .wpcf7-submit:hover ~ .shine {
  left: 120%;
  opacity: 1;
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

@media(max-width: 1024px) {
  .form-custom .form-group {
    width: 100% !important;
  }
  .form-custom .flex.gap-10 {
    flex-direction: column;
    gap: 0px;
    margin-bottom: 0;
  }

  .form-custom {
    max-width: 100%;
    padding: 0 25px;
  }

  .form-custom .subm p {
    width: 100%;
  }

  .form-custom .wpcf7-submit {
    display: flex;
    justify-content: center;
    alight-items: center;
    width: 100%;
  }

  .form-custom .form-group {
    margin-bottom: 20px;
  }
}
</style>

<section id="awards" class="py-10 lg:py-[90px] overflow-x-hidden">
    <div class="w-[calc(100%-6%)] mx-auto h-[1px] bg-[#DDDDDD]"></div>
    <div class="pl-0 pr-0 lg:pr-[calc((100%-1024px)/2)] xl:pr-[calc((100%-1296px)/2)] flex flex-col lg:flex-row lg:justify-between gap-8 lg:gap-[65px] mt-10 lg:mt-[90px]">
        <img src="<?php echo $left_image; ?>" alt="img" class="img min-h-[400px] h-[400px] lg:min-h-[auto] lg:h-[auto] min-w-[25%] w-full min-w-full md:min-w-[45%] lg:min-w-[452px] md:w-[45%] lg:w-[452px]">
        <div class="form-custom w-full">
            <h2 class="uppercase text-[32px] leading-[32px] md:text-[40px] md:leading-[40px] lg:text-h2 lg:leading-h2 font-light font-archivo text-[#0B0B0B] max-w-[678px] mb-[20px]"><?= esc_html($title) ?></h2>
            <h4 class="font-archivo font-light text-[20px] md:text-[26px] lg:text-h4 leading-[20px] md:leading-[26px] lg:leading-h4 text-[#0B0B0B] mb-[60px] uppercase"><?= esc_html($subtitle) ?></h5>
            <?php echo do_shortcode($form_shortcode); ?>
        </div>
    </div>
    <div class="w-[calc(100%-6%)] mx-auto h-[1px] bg-[#DDDDDD] mt-10 lg:mt-[87px]"></div>
</section>