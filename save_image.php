<?php
header('Access-Control-Allow-Origin: http://localhost:3000');

// Define the folder to save images
$imageFolder = "images/";

// Loop through existing images and delete them
$existingImages = glob($imageFolder . "*");
foreach($existingImages as $file) {
    if(is_file($file))
        unlink($file); // Delete the file
}

// Incoming image data
$image = $_POST["image"];

// Decode base64 image data
$image = str_replace('data:image/jpeg;base64,', '', $image);
$image = str_replace(' ', '+', $image);
$imageData = base64_decode($image);

// Loop index
$imageIndex = 1;

// Save 5 images with unique filenames
while ($imageIndex <= 5) {
    // Generate unique filename with timestamp
    $timestamp = time(); // Get current timestamp
    $filename = $imageFolder . "image_" . $timestamp . "_" . $imageIndex . ".jpeg";

    // Save image to the images folder
    file_put_contents($filename, $imageData);

    echo "Image saved as $filename<br>";

    $imageIndex++;
}
// Execute emotion_analysis.py
// Execute emotion_analysis.py
// Execute emotion_analysis.py
//$output = shell_exec('C:\Users\HP\AppData\Local\Programs\Python\Python37\python.exe C:\xampp\htdocs\webrtc-firebase\emotion_analysis.py 2>&1');
//echo "<pre>$output</pre>";





//$output = shell_exec('python3 emotion_analysis.py 2>&1');
//echo "<pre>$output</pre>";


