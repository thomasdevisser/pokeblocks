import { __ } from "@wordpress/i18n";
import { useBlockProps } from "@wordpress/block-editor";
import "./editor.scss";

export default function Edit({ attributes: { pokemonName }, setAttributes }) {
  const onChangePokemonName = (e) => {
    setAttributes({ pokemonName: e.target.value });
  };

  return (
    <div {...useBlockProps()}>
      <input type="text" name="pokemon-name" value={pokemonName} onChange={onChangePokemonName} />
      {pokemonName && <div className="pokemon-info">{pokemonName} is a cool Pokemon!</div>}
    </div>
  );
}
