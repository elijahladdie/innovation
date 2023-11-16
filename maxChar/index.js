// Return the character most commonly used in the string.
// --- Examples
// maxChar("I loveeeeeee noodles") === "e"
// maxChar("1337") === "3"

function maxChar(str) {
  let characterObj = {};
  let maxChar = "";
  let maxCount = 0;

  for (let i = 0; i < str.length; i++) {
      const char = str[i];

      characterObj[char]  = characterObj[char] + 1 || 1;
      
      if(characterObj[char] > maxCount){
        maxChar = char;
        maxCount = characterObj[char]
      }
  }
  return maxChar;
}
const value = maxChar("maxsa")
console.log(value);
mocha.setup("bdd");
const { assert } = chai;

describe("Max Character", () => {
  it("maxChar() finds the most frequently used character", () => {
    assert.equal(maxChar("a"), "a");
    assert.equal(maxChar("test"), "t");
    assert.equal(maxChar("I loveeeeee noodles"), "e");
    assert.equal(maxChar("1337"), "3");
  });
});

mocha.run();
