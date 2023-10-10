let animals = ['elephant','zebra','bear','tiger'];
/**
 *  afterAll(()=>{})
 *  beforeAll(()=>{})
 */

beforeEach(()=>{
    console.log("Before Each")
    animals = ['elephant','zebra','bear','tiger']
})
describe("Animals array",()=>{
    it("should add animals to end of array",()=>{
        animals.push("aligator");
        expect(animals[animals.length -1 ]).toBe("aligator")
    });
    it("should add animals to beginning of array",()=>{
        animals.unshift("king-kong");
        expect(animals[0]).toBe("king-kong")
    });
    it("should return length of array as 4",()=>{
        
        expect(animals.length).toBe(4)
    })
})

describe("something else",()=>{
    /**  return this only
     * 
     *it.only("should return true ",()=>{
     *    expect(true).toBeTruthy();
     *})
    */
   
    it("should return true ",()=>{
        expect(true).toBeTruthy();
    })
})