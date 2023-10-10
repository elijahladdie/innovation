
import { sum } from './sum';

describe("toEqual and toBe", () => {
    it("Should add 1 + 2 to equal 3", () => {
        const result = sum(1, 2);
        expect(result).toBe(3)
    });


    it("Object assignment", () => {
        const obj = {};
        expect(obj).toEqual({})
    });
})


describe("truthy or falsy",()=>{
    it("null",()=>{
        const n = 0;
        expect(n).toBeFalsy();
        expect(n).not.toBeTruthy();
        // expect(n).toBeNull()
        expect(n).not.toBeUndefined();
    })
});


describe("Numbers",()=>{
    it("two plus two",()=>{
        const value = 2 + 2;
        expect(value).toBe(4)
        expect(value).toBeGreaterThan(3);
        expect(value).toBeGreaterThanOrEqual(4);
        expect(value).toBeLessThan(7)
        expect(value).toBeLessThanOrEqual(4)
    })

    it("adding floats",()=>{
        const value =0.1 + 0.2;
        expect(value).toBeCloseTo(0.299999999999)
    })
})

describe("String",()=>{
    it("there is no I in team",()=>{
        expect("team").not.toMatch(/I/);
    })
})

 
describe("Arrays",()=>{
    const shoppindLists = [
        'diapers','kleenex','trash bags','paper towels','milk'
    ];
    expect(shoppindLists).toContain('milk')
});

const compileAndroidCode = () => {
throw new Error("you are using wrong JDK")
} 

describe("exceptions",()=>{
it("compiling android code goes as expected",()=>{
    expect(()=>compileAndroidCode()).toThrow(Error);
})
})