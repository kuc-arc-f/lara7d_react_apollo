import React, { Component } from 'react';
import { Link } from 'react-router-dom';

//
class IndexRow extends Component {
  render() {
    return (
    <div>
      <Link to={`/todo_show/${this.props.obj.id}`} >
          <h3>{this.props.obj.title}</h3>
      </Link>      
      <Link to={`/todo_edit/${this.props.obj.id}`}
        className="btn btn-sm btn-outline-primary">Edit
      </Link>                  
      ID : {this.props.obj.id}
      <hr />
    </div>
    )
  }
}

export default IndexRow;