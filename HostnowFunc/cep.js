const handlep = (event) => {
    let input = event.target
    input.value = Maskp(input.value)
  }
  
  const Maskp = (value) => {
    if (!value) return ""
    value = value.replace(/\D/g,'')
    value = value.replace(/(\d{5})(\d)/,"$1-$2")
    return value
  }