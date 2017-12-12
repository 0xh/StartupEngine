<?php $sec = $value->slug; ?>
<?php
if ($page->json !== null) {
    $json = json_decode($page->json);
    $slug = $section->slug;
    if (isset($json->versions->$variationcount->$key->$field)) {
        $input = $json->versions->$variationcount->$key->$field;
    } else {
        $input = null;
    }
} else {
    $input = null;
}

?>
<?php $textareaname = "json[versions][$variationcount][$field][$value->slug]"; ?>
<?php $variablename = "simplemde" . $variationcount . $field . $value->slug; ?>
<div class="form-group" align="left">
    <label for="{{$key}}"><b>{{ucfirst($field)}}</b>
        - {{ucfirst($value->description)}}
    </label>
    <textarea type="{{$value->type}}"
              class="form-control"
              id="{{$textareaname}}"
              aria-describedby="{{$field}}"
              placeholder="{{$value->placeholder}}"
              name="json[versions][{{ $variationcount }}][{{$key}}][{{$value->slug}}]"
              rows="2"
              data-field="{{$field}}"
              data-section="{{$value->slug}}"
              }>
        <?php
        if ($page->json !== null) {
            $json = json_decode($page->json);
            $slug = $value->slug;
            if (isset($json->versions->$variationcount->$slug->$key)) {
                echo $input;
            }
        }
        ?></textarea>


    <script>
        var simplemde{{$variablename}} = new SimpleMDE({
            element: document.getElementById("<?php echo $textareaname; ?>"),
            status: false,
            toolbar: false
        });
        @if($input !== null)
        simplemde{{$variablename}}.value('{!! $input !!}');
        @endif
    </script>

</div>