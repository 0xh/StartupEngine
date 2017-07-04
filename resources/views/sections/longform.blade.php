<section class="bg-white" id="section-{{ $count }}" style="min-height:auto !important;">
    <!--.wrap.longform (width:72rem=720px) = Better reading experience (90-95 characters per line) -->
    <div class="wrap longform">
        <?php echo @markdown($section->getContent()); ?>
            <?php if($section->getImage() !== NULL) { ?>
            <figure class="text-pull" >
                <img src="<?php echo $section->getImage()->getFile()->getUrl(); ?>" alt="Robot" style="border-radius:4px;">
                <figcaption>
                    <p><?php echo $section->getImage()->getTitle(); ?></p>
                </figcaption>
            </figure>
            <?php } ?>
        @foreach($section->getComponents() as $component)
            <?php $type = $component->getContentType()->getName();?>  @include('components.'.strtolower($type))
        @endforeach
    </div>
</section>