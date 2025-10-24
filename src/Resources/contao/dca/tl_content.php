<?php

// Re-add image support to legacy accordion single palette
// Matches Contao 3.5 behaviour: add {image_legend},addImage and keep template/protected/expert/invisible

// If some other bundle (legacy-compat) overwrote the palette, merge ours back in.
$palette = $GLOBALS['TL_DCA']['tl_content']['palettes']['accordionSingle'] ?? '';

if ($palette) {
    // If image legend is missing, add it after the text_legend
    if (strpos($palette, '{image_legend},addImage') === false) {
        $palette = str_replace('{text_legend},text;', '{text_legend},text;{image_legend},addImage;', $palette);
        $GLOBALS['TL_DCA']['tl_content']['palettes']['accordionSingle'] = $palette;
    }
} else {
    // Fallback to the 5.3 core default with image support
    $GLOBALS['TL_DCA']['tl_content']['palettes']['accordionSingle'] = '{type_legend},type;{moo_legend},mooHeadline,mooStyle,mooClasses;{text_legend},text;{image_legend},addImage;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID;{invisible_legend:hide},invisible,start,stop';
}

// Ensure subpalette for addImage uses modern fields in 5.3 (core already defines this)
// addImage -> singleSRC,fullsize,size,floating,overwriteMeta

