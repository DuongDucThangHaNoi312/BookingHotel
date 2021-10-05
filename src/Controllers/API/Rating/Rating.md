# Rating API

## 1.check is user book room

### Method:POST

### API endpoint:

https://website.com/BookingHotel/isUserBookRoom

## header

param | type | description
--- | --- | ---
token | string |

#### Param

param | type | description
--- | --- | ---
maPhong | number | mã phòng

#### response

````ts
export interface BookRoom {
    status: string
    msg: string
    data: Data
    code: number
}

export interface Data {
    isUserBookRoom: boolean
}
````

## 2.get list user rating room

### Method:GET

### API endpoint:

https://website.com/BookingHotel/rating-rooms/:id

#### Param

param | type | description
--- | --- | ---
:id | number | id cua phong

#### response

````ts
export interface Ratting {
    status: string
    msg: string
    data: Data
    code: number
}

export interface Data {
    items: Item[]
}

export interface Item {
    hoTen: string
    content: string
    rating: string
    createDate: string
}
````

## 3.create rating

### Method:POST

### API endpoint:

https://website.com/BookingHotel/rating-rooms

## header

param | type | description
--- | --- | ---
token | string |

#### Param

param | type | description
--- | --- | ---
maPhong | number | mã phòng
content | string | nội dung comment
rating | number | đánh giá

#### response

````ts
export interface BookRoom {
    status: string
    msg: string
    data: Data
    code: number
}

export interface Data {
    id: number
}
````