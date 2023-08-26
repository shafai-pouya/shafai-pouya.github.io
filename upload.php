<?php

$img =     $_FILES['img'    ];
$project = $_POST ['project'];
$label   = $_POST ['label'  ];
$i       = $_POST ['i'      ];
$username = "pouya";

$hash = hash('sha1', strval($i.time().$label.$project.$username));
$ext = pathinfo($img['name'])['extension'];


if(!is_dir("images")){
	mkdir ("images");
}


if(move_uploaded_file($img['tmp_name'], "images/$hash.$ext")){
	echo "images/$hash.$ext";
} else {
	echo 'Faild';
	http_response_code(500);
}
