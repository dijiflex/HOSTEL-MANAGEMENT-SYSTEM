let  seeRoomDetail_btn= document.getElementById("singleBedRoom");
let room1=document.getElementById("room1");
let roomHide=document.getElementById("singleBedRoomHide");
room1.style.display='none';
roomHide.style.display='none';
    seeRoomDetail_btn.addEventListener('click',function () {
    seeRoomDetail_btn.style.display='none';
    room1.style.display='block';
    roomHide.style.display='block';
});

roomHide.addEventListener('click',function () {
    seeRoomDetail_btn.style.display='block';
    room1.style.display='none';
    roomHide.style.display='none';
});

// ================ROOM TWO DETAILS
let  seeRoomDetail_btn2= document.getElementById("singleBedRoom2");
let room2=document.getElementById("room2");
let roomHide2=document.getElementById("singleBedRoomHide2");
room2.style.display='none';
roomHide2.style.display='none';

    seeRoomDetail_btn2.addEventListener('click',function () {
    seeRoomDetail_btn2.style.display='none';
    room2.style.display='block';
    roomHide2.style.display='block';
})

roomHide2.addEventListener('click',function () {
    seeRoomDetail_btn2.style.display='block';
    room2.style.display='none';
    roomHide2.style.display='none';
})
//===========ROOM DETAILS 3
let  seeRoomDetail_btn3= document.getElementById("singleBedRoom3");
let room13=document.getElementById("room13");
let roomHide3=document.getElementById("singleBedRoomHide3");
room13.style.display='none';
roomHide3.style.display='none';
    seeRoomDetail_btn3.addEventListener('click',function () {
    seeRoomDetail_btn3.style.display='none';
    room13.style.display='block';
    roomHide3.style.display='block';
});

roomHide3.addEventListener('click',function () {
    seeRoomDetail_btn3.style.display='block';
    room13.style.display='none';
    roomHide3.style.display='none';
});
