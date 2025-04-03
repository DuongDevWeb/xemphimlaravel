@extends('fontend.movie.movie')
@section('content')
<div class="layout container">
    <div class="layout__left">
        <div class="mt-5"></div>
        <div id="player-wrapper" class=" player">
            <!-- video -->
              @if (!empty($movie->video))
         <div class="player-wrapper">
        {!! $movie->video !!}
    </div>
        @else
    <p>Video hiện không khả dụng.</p>
        @endif

        </div>
        <!-- endvideo -->
        <div class="player__videos">
            <div class="player__videos__video">
                <div class="cdn-selector-wrapper">
                    <button class="player__cdn set-player-source player__cdn--active" data-media-title="Default"
                        data-cdn-name="StreamQQ Plan VIP" data-active="true"
                        data-source="{{$movie->video}}">
                        Server 1
                    </button>
                </div>
            </div>
        </div>
        <script>
            (function () {
                const playerWrapper = document.getElementById('player-wrapper')
                const message = ``
                function setPlayerSource(url) {
                    document.querySelectorAll('.set-player-source').forEach(e => e.classList.remove('player__cdn--active') || e.classList.add('cdn-selector-button--inactive'))
                    const activeBtn = document.querySelector('.set-player-source[data-source="' + url + '"]')
                    activeBtn.setAttribute('data-active', 'true')
                    activeBtn.classList.add('player__cdn--active')
                    activeBtn.classList.remove('cdn-selector-button--inactive')

                    if (!url && message) {
                        playerWrapper.innerHTML = message
                        return
                    }

                    playerWrapper.innerHTML = `<iframe src="` + url + `" style="border: 0px; width: 100%; height: 100%;" frameborder="0" scrolling="0" allowfullscreen></iframe>`
                }

                document.querySelectorAll('.set-player-source').forEach(e => e.addEventListener('click', e => setPlayerSource(e.target.getAttribute('data-source'))))
                const firstSourceElement = document.querySelector('.set-player-source')
                if (firstSourceElement) {
                    firstSourceElement.click()
                } else {
                    playerWrapper.innerHTML = message
                }
            })()
        </script>
        <style>
            #under-player-ads-container {
                min-height: 180px;
            }

            #under-player-ads {
                display: none;
            }

            .self-banner-ads {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
            }

            .self-banner-add-item {
                cursor: pointer;
                text-align: center;
                height: 40px;
                aspect-ratio: 728/90;
                max-width: 100%;
            }

            .net-banner-ads {
                display: flex;
                justify-content: center;
            }
        </style>
        <header class="heading">
            <h1 class="heading__title" style="font-size: 1.45em;">{{$movie->name}}</h1>
        </header>
        @if (!empty($movie->tags))
                @php
                    $tags = explode(',', $movie->tags);
                @endphp
                <article>
                    <p>
                        {!! $movie->description !!}
                    </p>
                    <div class="video__tags">
    @foreach ($tags as $tag)
        <a href="{{ route('tag.videos', ['tag' => trim($tag)]) }}" class="label">
            <svg width="14px" height="14px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"
                fill="#ffffff" stroke="#ffffff">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path fill="#ffffff"
                        d="M878.08 448H241.92l-96 384h636.16l96-384zM832 384v-64H485.76L357.504 192H128v448l57.92-231.744A32 32 0 0 1 216.96 384H832zm-24.96 512H96a32 32 0 0 1-32-32V160a32 32 0 0 1 32-32h287.872l128.384 128H864a32 32 0 0 1 32 32v96h23.04a32 32 0 0 1 31.04 39.744l-112 448A32 32 0 0 1 807.04 896z">
                    </path>
                </g>
            </svg>
            <span>{{ trim($tag) }}</span>
        </a>
    @endforeach
</div>


                </article>
        @endif


        <!--  xem thêm -->
        @include('fontend.movie.xemthem')
    </div>
    @include('fontend.user.sidebar')
</div>
@endsection