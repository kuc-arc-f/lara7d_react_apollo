
import React, { Component }  from 'react';
import ReactDOM from 'react-dom';
import { HashRouter as Router, Route } from 'react-router-dom';
import { ApolloProvider } from "@apollo/client";
import client from '../apollo-client'

import Home from './Home';
import Test from './Test';
import Navbar from './layout/Navbar';
/* todos */
import todos from './todos/Index';
import todoCreate from './todos/Create';
import todoShow from './todos/Show';
import todoEdit from './todos/Edit';

class App extends Component {
  render() {
    return (
    <div className="App">
      <Router>
        <div>
        <ApolloProvider client={client}>
          <Navbar />
          <Route exact path='/' component={Home} />
          <Route path='/test' component={Test} />
          <Route path='/todos' component={todos} />
          <Route path='/todo_show/:id' component={todoShow}/>
          <Route path='/todos_create' component={todoCreate} />
          <Route path='/todo_edit/:id' component={todoEdit} />          
        </ApolloProvider>
        </div>
      </Router>
    </div>
    );
  }
}
export default App;

if (document.getElementById('app')) {
    ReactDOM.render(<App />, document.getElementById('app'));
}