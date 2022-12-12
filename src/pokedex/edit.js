import { __ } from "@wordpress/i18n";
import _ from "lodash";
import { useBlockProps } from "@wordpress/block-editor";
import { Spinner, __experimentalInputControl as InputControl } from "@wordpress/components";
import "./editor.scss";

export default function Edit({ attributes: { pokemon, isFetching }, setAttributes }) {
  let timeout;
  const onChangePokemonName = (value) => {
    if (timeout) {
      clearTimeout(timeout);
    }

    setAttributes({ pokemon, isFetching: true });

    timeout = setTimeout(async () => {
      const res = await fetch(`https://pokeapi.co/api/v2/pokemon/${value.toLowerCase()}`);
      pokemon = {};

      if (res.status != 200) {
        setAttributes({ isFetching: false, pokemon });
        return;
      }

      const data = await res.json();

      if (data) {
        pokemon = data;
        setAttributes({ isFetching: false, pokemon });
      }
    }, 2000);
  };

  return (
    <div {...useBlockProps()}>
      <div className="pokemon-input">
        <InputControl onChange={onChangePokemonName} />
        {isFetching && <Spinner />}
      </div>
      {Object.keys(pokemon).length === 0 ? (
        <p>No Pokemon found</p>
      ) : (
        <div className="pokemon-info">
          <img src={pokemon.sprites.front_default}></img>
          <div className="info">
            <h2 className="pokemon-name">{_.capitalize(pokemon.name)}</h2>
            <div className="types">
              {pokemon.types.map((type) => (
                <span class="type">{type.type.name}</span>
              ))}
            </div>
            <div className="meta">
              <p>
                <strong>Height:</strong> {pokemon.height}
              </p>
              <p>
                <strong>Weight:</strong> {pokemon.weight}
              </p>
            </div>
          </div>
        </div>
      )}
    </div>
  );
}
