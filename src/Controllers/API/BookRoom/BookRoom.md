# Book Room API

## 1.create Book Room

### Method:POST

### API endpoint:

https://website.com/BookingHotel/bookRooms

##header
param | type | description
--- | --- | ---
token | string |
####Param
param | type | description
--- | --- | ---
maPhong | number | mã phòng
startDate | string | ngày check in date
endDate | string | ngày check out date
SDT | string |
gia | string | gia phong
tenPhong | string | Tên Phòng
request | string | yêu cầu thêm về phòng

####response
````ts
export interface BookRoom {
    status: string
    msg: string
    data: Data
    code: number
}

export interface Data {
    qrcode: string
}
````
## 2.Login

### Method:post

### API endpoint:

https://website.com/BookingHotel/login


##### data x-www-form-urlencoded

key | type | value
--- | --- | ---
username | string | ten tk
password | string | mk



````ts
export interface User {
    status: 'error' | 'success'
    msg: string
    data: Data
    code: number
}
export interface Data {
    token: string
}
````