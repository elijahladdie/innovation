// Directions
// Return a string with the order of characters reversed
// --- Examples
//   reverse('abcd') === 'dcba'
//   reverse('Hello!') === '!olleH'

function reverse(str) {
	// const strArr = str.split('').reverse().join('');
	// let strArr = "";
	// for(let i = 0 ; i < str.length; i++){
	// 	const char = str[i] 
	// 	strArr = char + strArr
	// }
	// return strArr;

	return str.split('').reduce((output,char)=>{
		output = char+ output
		return output
	},'');
}
const reversed = reverse('Kellen')
console.log(reversed)
mocha.setup('bdd');
const { assert } = chai;

describe('String Reversal', () => {
	it('reverse() correctly reverses string', () => {
		assert.equal(reverse('ffaa'), 'aaff');
		assert.equal(reverse('  aaff'), 'ffaa  ');
	});
});

mocha.run();
