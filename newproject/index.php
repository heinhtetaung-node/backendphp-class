<?php

include('nav.php'); // အခြား file တစ် file က code တွေကို ဒီ file ထဲကိုပေါင်းထည့်ချင်ရင်သုံး

echo "new project";  // user ကို ရိုက်ထုတ်ပြချင်ရင် သုံး

?>

<ul>
	<li>LIst1 </li>
	<li>LIst2 </li>
	<li>LIst3 </li>
	<li>LIst4 </li>
	<li><?php echo 'List 5'; ?></li>
</ul>

<?php echo 'The end'; ?>