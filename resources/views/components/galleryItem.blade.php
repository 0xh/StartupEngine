<?php if($item->getFeaturedImage() !== NULL) { ?>
    <li class="article" style="float:left; background:#fff;">
        <a href="/{{ $item->getSlug() }}">
            <figure>
                <?php echo "<img src='".$item->getFeaturedImage()->getFile()->getUrl()."'/>"; ?>
                <figcaption>
                    <h2>{{ $item->getTitle() }}</h2>
                    <p>{{  $item->getDescription() }}</p>
                </figcaption>
            </figure>
        </a>
    </li>
<?php } ?>