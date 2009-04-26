<?php // $Id$
// WavForge example

require_once "../src/WavForge.php";

$wf = new WavForge();
$wf->setBitsPerSample(16);
$wf->synthesizeSine(440, 1, 1); // 440 Hz, 100% volume, 1 second
$wf->synthesizeSawtooth(440, 1, 1); // 400 Hz, 100% volume, 1 second
$wf->synthesizeNoise(1, 1); // 100% volume, 1 second

if (php_sapi_name() == 'cli') { // Command line?
    $fp = fopen("tone_test.wav", "wb");
    fwrite($fp, $wf->getWAVData());
    fclose($fp);
    echo "tone_test.wav written\n";
} else {
    header("Content-Type: audio/wav");
    echo $wf->getWAVData();
}