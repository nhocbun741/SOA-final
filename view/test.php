<?php
									$json = file_get_contents('http://localhost:8080/iBanking/rest/services/category');
									$obj = json_decode($json);
									echo '<h3> Employee </h3>';
									echo $obj;
									echo $obj[0]->categoryID;
									echo $obj[0]->categoryName;
									
										foreach($obj as $key=>$value){
										  echo $value->categoryName;
										}
									?>