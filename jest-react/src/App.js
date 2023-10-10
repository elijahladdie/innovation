import logo from './logo.svg';
import './App.css';
import Todo from './components/todos';

function App() {
  const todos = [
    { id: 1, title: 'wash dishes', completed: false },
    { id: 2, title: 'make dinner', completed: true }
  ]
  return (
    <div className="App">
      {
        todos.map((todo) => <Todo todo={todo} />)
      }
    </div>
  );
}

export default App;
