<section class="" id="section-{{ $count }}" style="min-height:auto !important;">
    <div class="wrap aligncenter">
        <br>
        <h3>{{ $section->getTitle() }}</h3>
        <p>{{ $section->getDescription() }}</p>
        <ul class="flexblock gallery">


            <?php foreach($section->getImages() as $image) { ?>
                <li>
                    <a href="">
                        <figure style="background:url('http:<?php echo $image->getFile()->getUrl(); ?>');background-position:center; background-size:cover;padding-top:55%;border-radius:4px;">
                            <div class="overlay">
                                <h2>{{ $image->getTitle() }}</h2>
                                <p>{{ $image->getDescription() }}</p>
                            </div>
                        </figure>
                    </a>
                </li>

            <?php } ?>
        </ul>
    </div>
</section>