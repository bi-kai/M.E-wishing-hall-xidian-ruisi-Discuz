<?php
/*
	wishing_hall ajax By bikai[RS Team] 2013-02-10
*/
header("Content-Type:text/xml;charset=utf-8");
header("Cache-Control:no-cache");   

// if($_GET['action'] == 'checkusername') {  
$conn=mysql_connect("localhost","root",""); 
     if(!$conn){   
         die('Could not connect: '.mysql_error());   
     }//else{echo "连接数据库成功!"; }   
	 
     mysql_select_db("ruisi",$conn);   
     mysql_query("set names utf8");    
 //查询
     $res = mysql_query("SELECT q.uid,q.time,q.qdxq,q.todaysay,q.godsay,m.username FROM wishing_hall_wish q,common_member m where q.uid=m.uid order by q.time desc limit 0,10");  

echo '<?xml version="1.0" encoding="utf-8"?>
<root>
<item>'.mysql_num_rows($res).'</item>
';
 	$result='';
//	print_r(mysql_fetch_array($res));
 	while($row=mysql_fetch_array($res)){
//		foreach($row as $key=>$val){$result.="$val";}
		if($row['qdxq']=="kx"){$row['qdxq']="虔诚的想要听取神的教诲，并说";
		}elseif($row['qdxq']=="ng"){$row['qdxq']="给神磕了个大大的响头，并说";
		}elseif($row['qdxq']=="ym"){$row['qdxq']="给神上了一炷香，并说";
		}elseif($row['qdxq']=="wl"){$row['qdxq']="给神献上鲜花，并说";
		}elseif($row['qdxq']=="nu"){$row['qdxq']="给神敬上玉饼，并说";
		}elseif($row['qdxq']=="ch"){$row['qdxq']="给神敬上一杯酒，并说";
		}elseif($row['qdxq']=="fd"){$row['qdxq']="暂无，并说";
		}elseif($row['qdxq']=="yl"){$row['qdxq']="暂无，并说";
		}elseif($row['qdxq']=="shuai"){$row['qdxq']="要给神修庙建祠堂，并说";
		}
			
		$result.="<wishing>
		<username>".$row['username']."</username>
		<uid>".$row['uid']."</uid>
		<time>".gmdate('Y-m-d H:i',$row["time"]+ 3600 * 8)."</time>
		<qdxq>".$row['qdxq']."</qdxq>
		<todaysay>".$row['todaysay']."</todaysay>
		<godsay>".$row['godsay']."</godsay>
</wishing>
";		
	}
  
//  if($result=mysql_num_rows($res)) {   
  //         $result="";   
//       }else{   
//          $result='';   
//   }
  
echo $result."</root>"; 
//mysql_free_result($res);
mysql_close($conn);
//}   
?>  