import axios from "axios";


export const fetchData = async (id) =>{
    const results = await axios.get(`https://jsonplaceholder.typicode.com/todos/${id}/`);
    console.log(results) 
    return results.data
}

const forEach = (items,callback) =>{

    for(let i =0;i<items.length;i++){
        callback(items[i])
    }
}

it("mock callback",()=>{
    const mockCallback = jest.fn(x => 42 +x);
    forEach([0,1],mockCallback);
    expect(mockCallback.mock.calls.length).toBe(2);
    expect(mockCallback.mock.calls[0][0]).toBe(0);
});

it("mock return",()=>{
    const mock = jest.fn();
    mock.mockReturnValueOnce(true).mockReturnValueOnce(false).mockReturnValueOnce("Hello");
    const results = mock();
    const results1 = mock();
    const results2 = mock();
    expect(results).toBe(true);
    expect(results1).toBe(false);
    expect(results2).toBe("Hello");
})

it("mock axios",async()=>{
jest.spyOn(axios,"get").mockReturnValueOnce({
    data:{
        id:1,
        todo: "Get 1M Subs"
    }
})
const results = await fetchData(1);
expect(results.todo).toBe("Get 1M Subs")
})