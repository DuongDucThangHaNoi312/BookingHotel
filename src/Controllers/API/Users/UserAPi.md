# User API

## 1.Get Users

### Method:GET

### API endpoint:

https://website.com/BookingHotel/users


````ts
export interface Users {
    status: 'error' | 'success'
    msg: string
    data: Data[]
    code: number
}

export interface Data {
    ID: string
    hoTen: string
    username: string
    email: string
    role: string
    urlQRcode:string
    createDate: string
}
````

## 2.Get user

### Method:GET

### API endpoint:

https://website.com/BookingHotel/user/:id



````ts
export interface User {
    status: 'error' | 'success'
    msg: string
    data: Data
    code: number
}

export interface Data {
    ID: string
    hoTen: string
    username: string
    email: string
    role: string
    urlQRcode:string
    createDate: string
}
````

## 3.Update user

### Method:PUT

### API endpoint:

https://website.com/BookingHotel/users


##### data x-www-form-urlencoded

key | type | value
--- | --- | ---
ID | string | id Của user
token | string | code xác thực bắn trên header
?username | string | tên tài khoản
?role | string | quyền
?email | string | email
?hoTen | string | ten
?diaChi | string | địa chỉ
?ngaySinh | string | Ngày Sinh


````ts
export interface User {
    status: 'error' | 'success'
    msg: string
    data: []
    code: number
}
````
## 4.create user

### Method:post

### API endpoint:

https://website.com/BookingHotel/users


##### data x-www-form-urlencoded

key | type | value
--- | --- | ---
ID | string | id Của user
token | string | code xác thực bắn trên header
username | string | tên tài khoản
role | string | quyền
email | string | email
hoTen | string | ten
diaChi | string | địa chỉ
ngaySinh | string | Ngày Sinh
password | string | password


````ts
export interface User {
    status: 'error' | 'success'
    msg: string
    data: []
    code: number
}
````
## 5.delete user

### Method:delete

### API endpoint:

https://website.com/BookingHotel/users/:id


##### data x-www-form-urlencoded

key | type | value
--- | --- | ---
token | string | code xác thực bắn trên header



````ts
export interface User {
    status: 'error' | 'success'
    msg: string
    data: []
    code: number
}
````
## 6.Login

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