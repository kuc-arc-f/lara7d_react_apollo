import React from 'react'
import { Link } from 'react-router-dom'

//
class Navbar extends React.Component {
  render(){
    return(
      <div>
        <div className="container">
          <Link to="/">[ Home ] </Link>
          <Link to="/About" className="ml-2">[ About ] </Link>
          <Link to="/todos" className="ml-2">[ Todos ] </Link>
        </div>
        <hr />
      </div>
    )
  }
}

export default Navbar;
