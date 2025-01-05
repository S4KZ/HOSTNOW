
const handle = (event) => {
   let input = event.target
   input.value = Mask(input.value)
 }
 
 const Mask = (value) => {
   if (!value) return ""
   value = value.replace(/\D/g,'')
   value = value.replace(/(\d{3})(\d)/,"$1.$2")
   value = value.replace(/(\d{3})(\d)/,"$1.$2")
   value = value.replace(/(\d{3})(\d)/,"$1-$2")

   return value
 }