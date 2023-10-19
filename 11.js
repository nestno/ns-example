const arr = [
    ['北京', '广州', '深圳', '曹县'],
    [
      ['天安门', '颐和园', '故宫'],
      ['天河', '荔湾', '珠江新城'],
      ['南山', '蛇口', '小梅沙'],
      ['山东', '齐鲁', '烟台']
    ],
    [
      [
        ['天安门1', '天安门2'],
        ['颐和园1', '颐和园2'],
        ['故宫1', '故宫2']
      ],
      [
        ['天河1', '天河2'],
        ['荔湾1', '荔湾2'],
        ['珠江新城1', '珠江新城2']
      ],
      [
        ['南山1', '南山2'],
        ['蛇口1', '蛇口2'],
        ['小梅沙1', '小梅沙2']
      ],
      [
        ['山东1', '山东2'],
        ['齐鲁1', '齐鲁2'],
        ['烟台1', '烟台2']
      ]
    ]
  ],
  selected = ['广州', '珠江新城', '珠江新城1'],
  value = []

for (let i = 0; i < selected.length; i++) {
  let current = value.length > 0 ? arr[i][value[i - 1]] : arr[i]
  console.log(arr[i])
  console.log(current)
  value.push(current.indexOf(selected[i]))
}
console.log(111)
console.log(value)
