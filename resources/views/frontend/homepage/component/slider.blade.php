 <!-- note -->
 <div class="grid wide">
    
    <div class="header-note">
        <p>Phòng luôn sạch sẽ, không gian rộng rãi, thoải mái tận hưởng, không lo về giá</p>
    </div>
</div>
<!-- slider -->

<div class="grid wide">

    <div class="row sm-gutter" style="background-color: #f5f5f5">

        <div class="col c-8 l-8 m-8 slideshow-container">
            <div class="mySlider fade">
                <img src="../frontend/image/ks1.jpg" style="width:100%" />
                <div class="text">Caption one</div>
            </div>
            {{-- <div class="mySlider fade">
                <img src="../frontend/image/ks2.jpg" style="width:100%" />
                <div class="text">Caption Two</div>
            </div>
            <div class="mySlider fade">
                <img src="../frontend/image/ks3.jpg" style="width:100%" />
                <div class="text">Caption Three</div>
            </div> --}}
            <div>
                <a class="prev" onclick="plusSlider(-1)">❮</a>
                <a class="next" onclick="plusSlider(1)">❯</a>
            </div>
            <div style="margin: 10px 0 0 46%">
                <span class="dot" onclick="currentSlider(1)"></span>
                <span class="dot" onclick="currentSlider(2)"></span>
                <span class="dot" onclick="currentSlider(3)"></span>
            </div>
          
        </div>

        <div class="col l-4 c-4 m-4 slider-fixed">
         <div class="slider-position">
             <img src="../frontend/image/ks4.jpg" />
         </div>
         <div class="slider-position">
             <img src="../frontend/image/ks5.jpg"/>
         </div>
        </div>
    </div>
</div>