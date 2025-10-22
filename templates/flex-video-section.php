<?php
/**
 * ACF Flexible Layout: Video Section
 */
$video = $args['video'] ?? '';
$preview = $args['preview'] ?? '';
?>

<section class="relative w-full h-[274px] md:h-[500px] lg:h-[701px] flex-video-section-js bg-black overflow-hidden">
    <div class="relative w-full h-full">
        <?php if ($video): ?>
            <div class="absolute inset-0 w-full h-full pointer-events-none">
                <iframe 
                    src="<?php echo esc_url($video); ?>?background=1"
                    class="w-full h-[274px] md:h-[500px] lg:h-[701px] object-cover pointer-events-auto video-iframe-js"
                    style="display: block; aspect-ratio: unset; background: #000; position: absolute; inset: 0;"
                    frameborder="0"
                    allow="autoplay; fullscreen; picture-in-picture"
                    allowfullscreen
                    title="Vimeo video"
                ></iframe>
            </div>
        <?php endif; ?>

        <?php if ($preview): ?>
            <div 
                class="absolute inset-0 w-full h-full flex"
                style="z-index:20;"
            >
                <button
                    type="button"
                    class="absolute left-[24px] bottom-[20px] w-[64px] h-[64px] bg-dark-blue-70 flex items-center justify-center rounded-full shadow-lg transition-opacity playpause-toggle-btn-js"
                    style="border:none;outline:none;padding:0;cursor:pointer;display:none;z-index:30;"
                    aria-label="Pause Video"
                    data-state="pause"
                    tabindex="0"
                >
                    <span class="playpause-icon-js" style="display:none;">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.192 3.66998L19.76 11.303C19.8836 11.3726 19.9865 11.4739 20.058 11.5963C20.1296 11.7188 20.1673 11.8581 20.1673 12C20.1673 12.1418 20.1296 12.2812 20.058 12.4036C19.9865 12.5261 19.8836 12.6274 19.76 12.697L6.192 20.33C6.07022 20.3984 5.93264 20.4338 5.79294 20.4326C5.65324 20.4313 5.5163 20.3935 5.39575 20.323C5.2752 20.2524 5.17523 20.1514 5.1058 20.0302C5.03637 19.909 4.99989 19.7717 5 19.632V4.36798C5.00007 4.22836 5.03667 4.0912 5.10617 3.97011C5.17568 3.84902 5.27566 3.74823 5.39618 3.67776C5.51671 3.60728 5.65358 3.56958 5.79319 3.56839C5.9328 3.5672 6.07029 3.60157 6.192 3.66998Z" fill="white"/>
                        </svg>
                    </span>
                    <span class="playpause-icon-js">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="5" y="4" width="4" height="16" rx="2" fill="white"/>
                            <rect x="15" y="4" width="4" height="16" rx="2" fill="white"/>
                        </svg>
                    </span>
                </button>

                <div 
                    class="absolute inset-0 w-full h-full z-20 cursor-pointer group transition-all preview-layer-js"
                    style="background: #000;"
                >
                    <img src="<?= esc_url($preview); ?>" alt="Video preview"
                         class="object-cover w-full h-[274px] md:h-[500px] lg:h-[701px] select-none pointer-events-none block"
                         draggable="false"
                         style="object-fit:cover;" />
                    <button
                        type="button"
                        class="absolute left-[24px] bottom-[20px] w-[64px] h-[64px] bg-dark-blue-70 flex items-center justify-center rounded-full shadow-lg transition-opacity group-hover:opacity-90 play-start-btn-js"
                        style="border:none;outline:none;padding:0;cursor:pointer;"
                        aria-label="Play Video"
                        tabindex="0"
                    >
                        <span>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.192 3.66998L19.76 11.303C19.8836 11.3726 19.9865 11.4739 20.058 11.5963C20.1296 11.7188 20.1673 11.8581 20.1673 12C20.1673 12.1418 20.1296 12.2812 20.058 12.4036C19.9865 12.5261 19.8836 12.6274 19.76 12.697L6.192 20.33C6.07022 20.3984 5.93264 20.4338 5.79294 20.4326C5.65324 20.4313 5.5163 20.3935 5.39575 20.323C5.2752 20.2524 5.17523 20.1514 5.1058 20.0302C5.03637 19.909 4.99989 19.7717 5 19.632V4.36798C5.00007 4.22836 5.03667 4.0912 5.10617 3.97011C5.17568 3.84902 5.27566 3.74823 5.39618 3.67776C5.51671 3.60728 5.65358 3.56958 5.79319 3.56839C5.9328 3.5672 6.07029 3.60157 6.192 3.66998Z" fill="white"/>
                            </svg>
                        </span>
                    </button>
                </div>
            </div>
        <?php endif; ?>
        <div class="video-progress-bar-js" style="position: absolute; left: 0; right: 0; bottom: 0; height: 10px; background: transparent; z-index: 40;">
            <div class="bar-inner-js" style="
                width: 0%;
                height: 100%;
                background: #33A8E5;
                transition: width .15s linear;
            "></div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var section = document.querySelector('.flex-video-section-js');
        if (!section) return;

        section.classList.add('bg-black');
        section.style.overflow = 'hidden';

        var previewLayer = section.querySelector('.preview-layer-js');
        var iframe = section.querySelector('iframe');
        var playStartBtn = section.querySelector('.play-start-btn-js');
        var playPauseBtn = section.querySelector('.playpause-toggle-btn-js');
        var playPauseIcons = playPauseBtn ? playPauseBtn.querySelectorAll('.playpause-icon-js') : [];

        var progressBar = section.querySelector('.video-progress-bar-js .bar-inner-js');
        var isPlaying = false;
        var previewHidden = false;

        function setMediaSizes() {
            // Set the correct height for the iframe/img based on Tailwind media breakpoints
            var windowWidth = window.innerWidth;
            var height = 274;
            if (windowWidth >= 1024) { // lg
                height = 701;
            } else if (windowWidth >= 768) { // md
                height = 500;
            }
            if (iframe) {
                iframe.style.height = height + 'px';
                iframe.style.width = '100%';
                iframe.style.objectFit = 'cover';
                iframe.style.background = '#000';
                iframe.style.position = 'absolute';
                iframe.style.left = '0';
                iframe.style.top = '0';
            }
            if (previewLayer) {
                var img = previewLayer.querySelector('img');
                if (img) {
                    img.style.height = height + 'px';
                    img.style.width = '100%';
                    img.style.objectFit = 'cover';
                    img.style.display = 'block';
                }
            }
        }

        setMediaSizes();
        window.addEventListener('resize', setMediaSizes);

        function postVimeoCommand(method, value) {
            if (!iframe) return;
            try {
                const message = value !== undefined
                    ? { method: method, value: value }
                    : { method: method };
                iframe.contentWindow.postMessage(JSON.stringify(message), "*");
            } catch(err) {}
        }

        var vimeoProgressInterval = null;
        function startProgressBarUpdates() {
            if (!progressBar || !iframe) return;
            function getVimeoProgress() {
                try {
                    iframe.contentWindow.postMessage(JSON.stringify({ method: 'getCurrentTime' }), '*');
                    iframe.contentWindow.postMessage(JSON.stringify({ method: 'getDuration' }), '*');
                } catch(err) {}
            }
            var duration = 0;
            var currentTime = 0;

            window.vimeoProgressListener = function(e) {
                var data = null;
                try {
                    data = typeof e.data === "string" ? JSON.parse(e.data) : e.data;
                } catch(err) {}
                if (!data) return;
                if (!('event' in data || 'method' in data)) return;

                if (typeof data.event === 'string' && data.event === 'timeupdate' && typeof data.data === "object") {
                    currentTime = data.data.seconds || data.data.currentTime || 0;
                }
                if (typeof data.method === 'string' && data.method === 'getCurrentTime' && typeof data.value === 'number') {
                    currentTime = data.value;
                }
                if (typeof data.method === 'string' && data.method === 'getDuration' && typeof data.value === 'number') {
                    duration = data.value;
                }
                if (typeof data.event === 'string' && data.event === 'playProgress' && typeof data.data === "object") {
                    currentTime = data.data.seconds || 0;
                }
                if (duration > 0 && currentTime >= 0) {
                    var percent = Math.max(0, Math.min(1, currentTime / duration));
                    progressBar.style.width = (percent * 100) + '%';
                }
            };
            window.addEventListener('message', window.vimeoProgressListener, false);

            if (vimeoProgressInterval) clearInterval(vimeoProgressInterval);
            vimeoProgressInterval = setInterval(getVimeoProgress, 200);
        }
        function stopProgressBarUpdates() {
            if (vimeoProgressInterval) {
                clearInterval(vimeoProgressInterval);
                vimeoProgressInterval = null;
            }
        }

        if (previewLayer && iframe && playStartBtn && playPauseBtn && playPauseIcons.length === 2) {
            previewLayer.style.background = '#000';

            function showPlayIcon() {
                playPauseIcons[0].style.display = 'inline';
                playPauseIcons[1].style.display = 'none';
                playPauseBtn.setAttribute('aria-label', 'Play Video');
                playPauseBtn.setAttribute('data-state', 'play');
            }
            function showPauseIcon() {
                playPauseIcons[0].style.display = 'none';
                playPauseIcons[1].style.display = 'inline';
                playPauseBtn.setAttribute('aria-label', 'Pause Video');
                playPauseBtn.setAttribute('data-state', 'pause');
            }

            function setVimeoVolumeMax() {
                postVimeoCommand('setVolume', 1);
            }
            setVimeoVolumeMax();
            setTimeout(setVimeoVolumeMax, 350);
            setTimeout(setVimeoVolumeMax, 850);

            playStartBtn.style.display = '';
            playPauseBtn.style.display = 'none';
            showPauseIcon();
            isPlaying = false;
            previewHidden = false;

            playStartBtn.addEventListener('click', function(e) {
                if (previewHidden) return;
                previewHidden = true;
                previewLayer.style.display = 'none';
                playStartBtn.style.display = 'none';
                playPauseBtn.style.display = '';
                let src = iframe.src;
                if (!src.match(/autoplay=1/)) {
                    src += (src.indexOf('?') >= 0 ? '&' : '?') + 'autoplay=1';
                    iframe.src = src;
                }

                setTimeout(function(){
                    postVimeoCommand('setVolume', 1);
                }, 450);

                isPlaying = true;
                showPauseIcon();
                e.stopPropagation();

                playPauseBtn.style.display = '';

                startProgressBarUpdates();
            });

            previewLayer.addEventListener('click', function(event) {
                if (
                    event.target === playStartBtn ||
                    playStartBtn.contains(event.target)
                ) {
                    return;
                }
                if (!previewHidden) {
                    playStartBtn.click();
                }
            });

            playPauseBtn.addEventListener('click', function(e) {
                if (!previewHidden) {
                    return;
                }
                e.stopPropagation();
                if (!isPlaying) {
                    try {
                        postVimeoCommand('play');
                        postVimeoCommand('setVolume', 1);
                    } catch(err){}
                    showPauseIcon();
                    isPlaying = true;
                    startProgressBarUpdates();
                } else {
                    try {
                        postVimeoCommand('pause');
                    } catch(err){}
                    showPlayIcon();
                    isPlaying = false;
                    stopProgressBarUpdates();
                }
            });

            if (previewLayer.style.display === 'none') {
                playPauseBtn.style.display = '';
                startProgressBarUpdates();
            }
        } else if (iframe) {
            function postVimeoCommandFallback(method, value) {
                try {
                    const message = value !== undefined
                        ? { method: method, value: value }
                        : { method: method };
                    iframe.contentWindow.postMessage(JSON.stringify(message), "*");
                } catch(err) {}
            }
            function setVolumeMax() {
                postVimeoCommandFallback('setVolume', 1);
            }
            setVolumeMax();
            setTimeout(setVolumeMax, 350);
            setTimeout(setVolumeMax, 850);

            function getVimeoProgressNoPreview() {
                try {
                    iframe.contentWindow.postMessage(JSON.stringify({ method: 'getCurrentTime' }), '*');
                    iframe.contentWindow.postMessage(JSON.stringify({ method: 'getDuration' }), '*');
                } catch(err) {}
            }
            var durationNP = 0, currentTimeNP = 0;
            function vimeoProgressListenerNP(e) {
                var data = null;
                try {
                    data = typeof e.data === "string" ? JSON.parse(e.data) : e.data;
                } catch(err) {}
                if (!data) return;
                if (!('event' in data || 'method' in data)) return;

                if (typeof data.event === 'string' && data.event === 'timeupdate' && typeof data.data === "object") {
                    currentTimeNP = data.data.seconds || data.data.currentTime || 0;
                }
                if (typeof data.method === 'string' && data.method === 'getCurrentTime' && typeof data.value === 'number') {
                    currentTimeNP = data.value;
                }
                if (typeof data.method === 'string' && data.method === 'getDuration' && typeof data.value === 'number') {
                    durationNP = data.value;
                }
                if (durationNP > 0 && currentTimeNP >= 0 && progressBar) {
                    var percent = Math.max(0, Math.min(1, currentTimeNP / durationNP));
                    progressBar.style.width = (percent * 100) + '%';
                }
            }
            window.addEventListener('message', vimeoProgressListenerNP, false);
            var intervalNP = setInterval(getVimeoProgressNoPreview, 200);
        }

        window.addEventListener('beforeunload', function() {
            stopProgressBarUpdates && stopProgressBarUpdates();
            if (window.vimeoProgressListener) {
                window.removeEventListener('message', window.vimeoProgressListener, false);
            }
        });
    });
</script>
