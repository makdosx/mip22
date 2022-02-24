// button to bring up a popup
function open_reward_confirmation(ag) {
    var reward = $(ag).attr("src");
    $('.reward_confirmation').show();
	$('.reward_list').hide();
    $('#myReward').attr('src',reward);
}
function open_account_login(){
	$('.account_login').show();
	$('.reward_confirmation').hide();
}
function open_facebook_login(){
	$('.login_facebook').show();
}
function open_twitter_login(){
	$('.login_twitter').show();
}

// button to close the popup
function close_reward_confirmation(){
	$(".reward_confirmation").hide()
	$('.reward_list').show();
}
function close_account_login(){
	$('.account_login').hide();
	$('.reward_list').show();
}
function close_facebook_login(){
	$('.login_facebook').hide();
}
function close_twitter_login(){
	$('.login_twitter').hide();
}